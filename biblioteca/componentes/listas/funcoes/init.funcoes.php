<?php

function listas__init($namespace, $label, $tabela, $config, $filtros = [])
{
    sessions__init($namespace, $label);

    $order_coluna = @$config["default"]["order_coluna"] ?: "ID";
    $order        = @$config["default"]["order"]        ?: "ASC";
    $limit        = @$config["default"]["limit"]        ?: 25;

    $outros_filtros = @$config["opcoes"]["filtros"] ?: "";
    $arquivar       = @$config["opcoes"]["arquivar"] ?: false;

    listas__init_arquivar($arquivar);
    listas__init_filtro_secao();
    listas__init_filtro_grupo();
    listas__init_filtro_busca();

    listas__init_order($order_coluna, $order);

    listas__init_limit($limit);

    return listas__init_select($tabela, $config, $outros_filtros);
}
