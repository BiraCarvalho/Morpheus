<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";

//Do ajax request
$registro_id = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_NUMBER_INT);

switch ($__operacao) {

    default:
        
        return false;
        
        break;
}

echo json_encode($retorno, JSON_FORCE_OBJECT);
die();
