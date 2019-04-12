<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

if( $secao_formato == "dashboard"){
    require_once __DIR__ . "/dashboard/init.inc.php";
}