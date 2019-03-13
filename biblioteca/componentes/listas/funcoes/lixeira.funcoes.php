<?php

function listas__init_arquivar($ativada)
{
    if( $ativada !== true ){
        sessions__set("__filtro_arquivar", "false");
        return false;
    }

    if( !sessions__isset("__filtro_arquivar") ){
        sessions__set("__filtro_arquivar", "false");
    }

    $arquivar = filter_input(INPUT_GET, "arquivar");

    if( !empty($arquivar) ){
        sessions__set("__filtro_arquivar", $arquivar);
    }
}

function listas__get_arquivar_situacao()
{
    return sessions__get("__filtro_arquivar");
}

function listas__get_arquivar($tabela)
{
    $arquivar  = listas__get_arquivar_situacao();

    $valor = $arquivar == "true" ? 1 : 0;

    return " `{$tabela}`.`Arquivado` = '{$valor}' ";
}
