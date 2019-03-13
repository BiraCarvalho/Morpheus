<?php

function listas__init_filtro_secao()
{
    $filtro_secao = filter_input(INPUT_GET, "filtro_secao");

    if ($filtro_secao === "false"){
        sessions__unset("__filtro_secao_id");
    }

    $filtro_secao_id = filter_input(INPUT_GET, "sid", FILTER_SANITIZE_NUMBER_INT);

    if ($filtro_secao_id) {
        sessions__set("__filtro_secao_id", $filtro_secao_id);
    }
}

function listas__get_secoes_titulos()
{
    $consulta = "SELECT * FROM Secoes";
    $secoes   = global__db()->fecthAll($consulta);

    if (!$secoes) {
        return false;
    }

    $retorno = [];

    foreach ($secoes as $secao) {
        $retorno[ $secao["Id"] ] = secoes__titulo_com_ascendentes($secao["Id"]);
    }

    return $retorno;
}

function listas__get_secoes_por_registro($tabela, $id)
{
    $consulta = "SELECT Secoes
    			   FROM {$tabela}
                  WHERE Id = '{$id}'";

    $secaos_ids = global__db()->fecthColumn($consulta);

    if (!$secaos_ids) {
        return false;
    }

    $secoes    = explode(",", $secaos_ids);
    $lista     = "";
    $separador = "";

    foreach ($secoes as $secao) {
        $secao_titulo = secoes__titulo_com_ascendentes($secao);
        $lista       .= $separador.$secao_titulo;
        $separador    = ", ";
    }

    return $lista;
}

function listas__get_filtro_secao($tabela)
{
    $secao_id  = sessions__get("__filtro_secao_id");

    if ($secao_id) {
        return " FIND_IN_SET( '{$secao_id}', `{$tabela}`.`Secoes` ) ";
    }

    return false;
}
