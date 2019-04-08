<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

if( $secao_formato == "cadastros-login"){
    require_once __DIR__ . "/login/init.inc.php";
}

if( $secao_formato == "cadastros-autenticacao"){
    require_once __DIR__ . "/autenticacao/init.inc.php";
}

if( $secao_formato == "cadastros-registro"){
    require_once __DIR__ . "/registro/init.inc.php";
}