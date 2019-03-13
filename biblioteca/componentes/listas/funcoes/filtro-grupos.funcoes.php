<?php

function listas__init_filtro_grupo()
{
    $filtro_grupo = filter_input(INPUT_GET, "filtro_grupo");

    if ($filtro_grupo === "false"){
        sessions__unset("__filtro_grupo_id");
    }

    $filtro_secao_id = filter_input(INPUT_GET, "gid", FILTER_SANITIZE_NUMBER_INT);

    if ($filtro_secao_id) {
        sessions__set("__filtro_grupo_id", $filtro_secao_id);
    }
}

function listas__get_grupos_titulos()
{
    $consulta = "SELECT * FROM Grupos";
    $grupos   = global__db()->fecthAll($consulta);

    if (!$grupos) {
        return false;
    }

    $retorno = [];

    foreach ($grupos as $grupo) {
        $retorno[ $grupo["Id"] ] = grupos__titulo_com_ascendentes($grupo["Id"]);
    }

    return $retorno;
}

function listas__get_grupos_por_registro($tabela, $id)
{
    $consulta = "SELECT Grupos
				   FROM {$tabela}
				  WHERE Id = '{$id}'";

    $grupos_ids = global__db()->fecthColumn($consulta);

    if (!$grupos_ids) {
        return false;
    }

    $grupos    = explode(",", $grupos_ids);
    $lista     = "";
    $separador = "";

    foreach ($grupos as $grupo) {
        $grupo_titulo = grupos__titulo_com_ascendentes($grupo);
        $lista       .= $separador.$grupo_titulo;
        $separador    = ", ";
    }

    return $lista;
}

function listas__get_filtro_grupo($tabela)
{
    $grupo_id  = sessions__get("__filtro_grupo_id");

    if ($grupo_id) {
        return " FIND_IN_SET( '{$grupo_id}', `{$tabela}`.`Grupos` ) ";
    }

    return false;
}
