<?php

function listas__init_limit($default)
{
    if(!sessions__get("__offset")){
      sessions__set("__offset", $default);
    }

    $offset_get = filter_input(INPUT_GET, "offset", FILTER_SANITIZE_NUMBER_INT) ?: sessions__get("__offset");

    if( $offset_get ){
      sessions__set("__offset", $offset_get);
    }

    $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT) ?: 1;
    sessions__set("__pagina", $pagina);
}

function listas__get_paginas($linhas)
{
    $offset = sessions__get("__offset");

    if ($linhas && $offset) {
        return ceil($linhas / $offset);
    }

    return 1;
}

function listas__get_limit($linhas)
{
    $offset  = sessions__get("__offset");
    $pagina  = sessions__get("__pagina");
    $paginas = listas__get_paginas($linhas);

    if ($pagina > $paginas) {
        $pagina = $paginas;
    };

    $limit = ($pagina - 1) * $offset;

    return " LIMIT {$limit},{$offset} ";
}
