<?php

function listas__init_filtro_busca()
{
    $filtro_busca = filter_input(INPUT_GET, "filtro_busca");

    if ($filtro_busca === "false") {
        sessions__unset("__busca_termo");
        sessions__unset("__busca_coluna");
    }

    $filtro_busca_termo  = filter_input(INPUT_GET, "termo");
    $filtro_busca_coluna = filter_input(INPUT_GET, "coluna");

    if ($filtro_busca_termo && $filtro_busca_coluna) {
        sessions__set("__busca_termo",  urldecode($filtro_busca_termo));
        sessions__set("__busca_coluna", urldecode($filtro_busca_coluna));
    }
}


function listas__get_busca($tabela, $colunas)
{
    if (sessions__get("__busca_termo") && sessions__get("__busca_coluna")) {

        $coluna = sessions__get("__busca_coluna");
        $tipo   = componentes__coluna_tipo($colunas,$coluna);
        $termo  = formatacao__mysql_gravacao($tipo, sessions__get("__busca_termo"));

        return " {$coluna} LIKE '%{$termo}%' ";
    }

    return false;
}
