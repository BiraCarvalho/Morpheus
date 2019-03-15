<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once "config.php";
require_once "funcoes.php";

if( $secao_formato == "formulario-contato"){
    require_once "contatos/init.inc.php";
}
