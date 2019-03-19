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
        $metadados["Valor"]      = "0";
        $metadados["Titulo"]     = "";
        $metadados["Texto"]      = "";

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

    case "resposta-check":

        $resposta["CadastrosId"]         = filter_input(INPUT_POST, "cadastro_id",    FILTER_SANITIZE_NUMBER_INT);
        $resposta["QuestionariosMetaId"] = filter_input(INPUT_POST, "pergunta_id",    FILTER_SANITIZE_NUMBER_INT);
        $resposta["Valor"]               = filter_input(INPUT_POST, "resposta_value", FILTER_SANITIZE_NUMBER_INT);
  
        $consulta = "SELECT Id 
                       FROM {$tabela}Respostas 
                      WHERE CadastrosId = ?
                        AND QuestionariosMetaId = ?";

        $resposta_id = global__db()->fetchColumn($consulta, [$resposta["CadastrosId"], $resposta["QuestionariosMetaId"]]);               
        
        $resposta_id = dbal__write($resposta, $tabela."Respostas", $resposta_id);
        
        $retorno = [
            "resposta_id" => $resposta_id
        ];

        break;

    case "resposta-uncheck":

        $retorno = [
            "resposta" => "uncheck"
        ];

    break;

}

echo json_encode($retorno, JSON_FORCE_OBJECT);
die();
