<?php

function listas__init_order($order_coluna, $order)
{
    $filtro_order        = filter_input(INPUT_GET, "ord") ?: $order;
    $filtro_order_coluna = filter_input(INPUT_GET, "orc") ?: $order_coluna;

    if ( $filtro_order && $filtro_order_coluna ) {
        sessions__set("__order", strtoupper($filtro_order) );
        sessions__set("__order_coluna", strtoupper($filtro_order_coluna) );
    }
}

function listas__get_order()
{
    $order  = sessions__get("__order");
    $coluna = sessions__get("__order_coluna");

    if( $order && $coluna ){
        return " ORDER BY `{$coluna}` {$order} ";
    }

    return "";
}
