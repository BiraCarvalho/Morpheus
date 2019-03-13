<?php

function listas__load_order_controles( $modulo, $coluna )
{
    $order = strtolower(sessions__get("__order"));
    $ativa = sessions__get("__order_coluna") == $coluna;

    return includes__load_part( __DIR__ . "/../parts/order",
        [
            "modulo"  => $modulo,
            "coluna"  => $coluna,
            "class"   => $ativa ? "lista--ordem-ativa-{$order}" : ""
        ]
    );
}

function listas__load_filtros($modulo, $config)
{
    return includes__load_part( __DIR__ . "/../parts/filtros",
        [
            "modulo"  => $modulo,
            "config"  => $config,
            "termo"   => sessions__get("__busca_termo"),
            "coluna"  => sessions__get("__busca_coluna")
        ]
    );
}

function listas__load_filtro_busca($modulo, $colunas)
{
    return includes__load_part( __DIR__ . "/../parts/filtros/busca",
        [
            "modulo"  => $modulo,
            "colunas" => $colunas,
            "termo"   => sessions__get("__busca_termo"),
            "coluna"  => sessions__get("__busca_coluna")
        ]
    );
}

function listas__load_offset($modulo)
{
    $array  = [5,10,20,50,100,150];
    $offset = sessions__get("__offset");
    $count  = listas__get_count();

    return includes__load_part(  __DIR__ . "/../parts/offset",
        [
            "modulo"  => $modulo,
            "array"   => $array,
            "offset"  => $offset,
            "count"   => $count?:0
        ]
    );
}

function listas__load_pager($modulo)
{
    $count  = listas__get_count();

    return includes__load_part(  __DIR__ . "/../parts/pager",
        [
            "modulo"  => $modulo,
            "count"   => $count?:0
        ]
    );
}
