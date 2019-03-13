<?php

function config__load_files( $path ){

    $__APLICACAO_LOAD_CONFIG = glob( $path );
    $__APLICACAO_CONFIG      = [];

    foreach( $__APLICACAO_LOAD_CONFIG as $__APLICACAO_CONFIG_PATH ){

    	$__APLICACAO_CONFIG_TEMP = require_once $__APLICACAO_CONFIG_PATH;

    	if( is_array( $__APLICACAO_CONFIG_TEMP ) ){
    		$__APLICACAO_CONFIG = array_merge( $__APLICACAO_CONFIG, $__APLICACAO_CONFIG_TEMP );
    	}

    }

    return $__APLICACAO_CONFIG;
}

function config__get_static($key_root,$key){
    global $__APLICACAO_CONFIG;
    return $__APLICACAO_CONFIG[$key_root][$key];
}

function config__get_db($slug)
{
    $slug     = filter_var($slug, FILTER_SANITIZE_MAGIC_QUOTES);
    $consulta = "SELECT `Valor` FROM Configuracoes WHERE `Slug`='{$slug}' AND Situacao = '1'";
    $retorno  = global__db()->fetchColumn($consulta);
    $retorno  = stripslashes($retorno);

    return $retorno;
}
