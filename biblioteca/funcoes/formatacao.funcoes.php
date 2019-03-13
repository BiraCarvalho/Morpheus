<?php

function formatacao__tempo($valor, $entrada, $saida)
{
    if ( empty($valor) || (int)$valor === 0 ) {
        return false;
    }

    $objeto = DateTime::createFromFormat($entrada, $valor);
    return $objeto->format($saida);
}

function formatacao__hora($datahora)
{
    return formatacao__tempo($datahora, 'H:i:s', 'H:i:s');
}

function formatacao__data_ISO($data)
{
    if( substr_count($data,"/") == 0 ){
        return $data;
    }

    return formatacao__tempo($data, 'd/m/Y', 'Y-m-d');
}

function formatacao__data_ptBR($data)
{
    if( substr_count($data,"-") == 0 ){
        return $data;
    }

    return formatacao__tempo($data, 'Y-m-d', 'd/m/Y');
}

function formatacao__datahora_ISO($data)
{
    if( substr_count($data,"/") == 0 ){
        return $data;
    }

    return formatacao__tempo($data, 'd/m/Y H:i:s', 'Y-m-d H:i:s');
}

function formatacao__datahora_ptBR($data)
{
    if( substr_count($data,"-") == 0 ){
        return $data;
    }

    return formatacao__tempo($data, 'Y-m-d H:i:s', 'd/m/Y H:i:s');
}

function formatacao__decimal_ptBR($valor)
{
    if(!is_numeric($valor)){
        return "0,00";
    }

    return number_format($valor, 2, ',','.');
}

function formatacao__decimal_enUS($valor)
{
    $valor = str_replace(".","",$valor);
    $valor = str_replace(",",".",$valor);

    if(!is_numeric($valor)){
        return 0;
    }

    return number_format($valor, 2, '.', '');
}

function formatacao__mysql_exibicao($tipo, $valor)
{
    if( $tipo === "datetime")
    {
        return formatacao__datahora_ptBR($valor);
    }
    elseif( $tipo === "date" )
    {
        return formatacao__data_ptBR($valor);
    }
    elseif( $tipo === "double" || $tipo === "decimal" )
    {
        return formatacao__decimal_ptBR($valor);
    }
    elseif( $tipo === "text" || $tipo === "tinytext" || $tipo === "longtext" )
    {
        $valor = stripslashes($valor);
        return html_entity_decode($valor);
        return null;
    }
    else
    {
        $valor = stripslashes($valor);
        return htmlspecialchars($valor);
    }
}

function formatacao__mysql_gravacao($tipo, $valor)
{
    if( $tipo === "datetime")
    {
        return formatacao__datahora_ISO($valor);
    }
    elseif( $tipo === "date" )
    {
        return formatacao__data_ISO($valor);
    }
    elseif( $tipo === "integer" )
    {
        return (int)$valor;
    }
    elseif( $tipo === "double" || $tipo === "decimal" )
    {
        return formatacao__decimal_enUS($valor);
    }
    else
    {
        $valor = htmlspecialchars_decode($valor);
        return addslashes($valor);
    }
}

function formatacao__guid($uuid)
{
    //Baseado : http://guid.us/GUID/PHP

    //e4eaaaf2-d142-11e1-b3e4-080027620cdd
    $charid = str_replace(".","",strtolower(md5($uuid)));
    $hyphen = chr(45);

    $guid =  substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);

    return $guid;
}

function formatacao__mysql_html($tabela, $resultado)
{
    $consulta = "SHOW COLUMNS FROM {$tabela}";
    $colunas  = global__db()->fetchAll($consulta);

    if( $resultado )
    {
        $retorno = [];

        foreach( $resultado as $coluna => $valor )
        {
        $tipo  = dbal__field_type($colunas, $coluna, $valor);
          $valor = formatacao__mysql_exibicao($tipo, $valor);
          $retorno[$coluna] = $valor;
        }

        return $retorno;
    }

	return null;
}
