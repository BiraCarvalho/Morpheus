<?php

function listas__init_select($tabela, $config, $outros_filtros = ""){

    $where = "";
    $group = "";

    $colunas = $config["colunas"];

    $columns = listas__get_colunas( $colunas );
    $join    = listas__get_join( $tabela, $colunas );

    $filtros[] = $outros_filtros;

    if( @$config["opcoes"]["arquivar"] ){
        $filtros[] = listas__get_arquivar( $tabela );
    }

    $filtros[] = listas__get_filtro_secao( $tabela );
    $filtros[] = listas__get_filtro_grupo( $tabela );
    $filtros[] = listas__get_busca( $tabela, $colunas );
    $where     = listas__get_where( $filtros );

    $order   = listas__get_order($tabela);

    listas__set_count($tabela, $join, $where);
    $linhas  = listas__get_count();
    $limit   = listas__get_limit($linhas);

    $consulta = "SELECT {$columns} FROM {$tabela} {$join} {$where} {$order} {$group} {$limit}";

    return global__db()->fetchAll($consulta);

}

function listas__get_where( $filtros = [] )
{
    $where    = "";
    $operador = "";

    foreach( $filtros AS $filtro ){
        if( !empty($filtro) ){
            $where   .= $operador.$filtro;
            $operador = " AND ";
        }
    }

    if( $where ){
        return " WHERE ".$where;
    }

    return false;
}

function listas__set_count($tabela, $join = "", $where = "")
{
    $consulta = "SELECT COUNT(*) FROM {$tabela} {$join} {$where}";
    $count    =  global__db()->fetchColumn($consulta);
    sessions__set("__count", (int)$count);
}

function listas__get_count(){
    return sessions__get("__count");
}

function listas__formata_valores_para_exibicao($colunas, $coluna_alias, $valor)
{
    if (!$colunas) {
        return false;
    }

    foreach ($colunas as $item){
        if ($coluna_alias == $item[2]) {
            $campo  = $item[0];
            $tipo   = $item["tipo"];
        }
    }

    return formatacao__mysql_exibicao($tipo, $valor);
}


function listas__get_colunas($colunas)
{
    $columns   = "";
    $separador = "";

    foreach ($colunas as $coluna) {
        $columns  .= "{$separador}`{$coluna[1]}`.`{$coluna[0]}` AS `{$coluna[2]}`";
        $separador = ",";
    }

    return $columns;
}
