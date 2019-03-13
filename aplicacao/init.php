<?php

ob_start();

session_start();

/** Carrega Constantes **/
require_once __DIR__ . '/constantes.php';

ini_set( "display_errors" , __DISPLAY_ERRORS  );
ini_set( "default_charset", __DEFAULT_CHARSET );

setlocale( LC_ALL, 'pt_BR','pt_BR.utf-8' );
date_default_timezone_set( 'America/Sao_Paulo' );

/** Carrega Funções do Sistema **/
$__SISTEMA_LOAD_FUNCOES = glob( __BIBLIOTECA_PATH . '/funcoes/*.funcoes.php' );

foreach( $__SISTEMA_LOAD_FUNCOES as $__PATH ){
    require_once $__PATH;
}

/** Carrega Configurações **/
$__APLICACAO_CONFIG = config__load_files( __APLICACAO_PATH . '/config/*.config.php' );

/** Composer Autoload **/
require_once __BIBLIOTECA_PATH . '/vendor/composer/autoload.php';

/** Conecta o banco de dados **/
require_once __DIR__ . '/conexoes.php';

/** Symfony Debug **/
require_once __DIR__ . '/debug.php';