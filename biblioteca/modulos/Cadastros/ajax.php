<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";

//Do ajax request
$meta_id     = filter_input(INPUT_POST, "meta_id");
$registro_id = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_NUMBER_INT);

switch ($__operacao) {

    case 'metadados-remover':

        $count   =  dbal__delete("Id", $meta_id, $tabela."Meta");
        $retorno = ["count" => $count ];

        break;

    case "metadados-adicionar":

        $metadados[$tabela."Id"] = $registro_id;
        $metadados["Tag"]        = filter_input(INPUT_POST, "tag");
        $metadados["Ordem"]      = "0";
        $metadados["Titulo"]     = "";
        $metadados["Valor"]      = "";

        $meta_id = dbal__write($metadados, $tabela."Meta", 0);

        $include = includes__load_form([
            "formulario"	=> __DIR__ . "/forms/meta-template",
            "registro"	 	=> $metadados,
            "meta_id"	 	=> $meta_id,
            "meta_tag"		=> "MetaCampo",
            "fk_id" 	 	=> $registro_id,
            "modulo"        => $__modulo,
            "tabela"        => $tabela,
        ]);

        $retorno = [
            "meta_id" => $meta_id,
            "include" => $include
        ];

        break;
}

echo json_encode($retorno, JSON_FORCE_OBJECT);
die();
