<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";
require_once __DIR__ . "/formatos/funcoes.php";

//Do ajax request
$pergunta_id = filter_input(INPUT_POST, "pergunta_id");
$registro_id = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_NUMBER_INT);

switch ($__operacao) {

    case "perguntas-adicionar":

        $perguntas[$tabela."Id"]  = $registro_id;
        $perguntas["Ordem"]       = "1";
        $perguntas["Agrupamento"] = "1";
        $perguntas["Titulo"]      = "";
        $perguntas["Texto"]       = "";

        $pergunta_id = dbal__write($perguntas, $tabela."Perguntas", 0);

        $include = includes__load_form([
            "formulario"  => __DIR__ . "/forms/pergunta-template",
            "registro"	  => $perguntas,
            "pergunta_id" => $pergunta_id,
            "fk_id" 	  => $registro_id,
            "modulo"      => $__modulo,
            "tabela"      => $tabela,
        ]);

        $retorno = [
            "pergunta_id" => $pergunta_id,
            "include"     => $include
        ];

        break;

    case 'perguntas-remover':

        $count   =  dbal__delete("Id", $pergunta_id, $tabela."Perguntas");
        $retorno = ["count" => $count ];

        break;

    case "resposta-check":

        $resposta["QuestionariosIndiceId"]    = filter_input(INPUT_POST, "indice_id",      FILTER_SANITIZE_NUMBER_INT);
        $resposta["QuestionariosPerguntasId"] = filter_input(INPUT_POST, "pergunta_id",    FILTER_SANITIZE_NUMBER_INT);
        $resposta["Valor"]                    = filter_input(INPUT_POST, "resposta_value", FILTER_SANITIZE_NUMBER_INT);
  
        $consulta = "SELECT Id 
                       FROM QuestionariosRespostas 
                      WHERE QuestionariosIndiceId = ?
                        AND QuestionariosPerguntasId = ?";

        $resposta_id = global__db()->fetchColumn($consulta, [$resposta["QuestionariosIndiceId"], $resposta["QuestionariosPerguntasId"]]);               
        
        $resposta_id = dbal__write($resposta, "QuestionariosRespostas", $resposta_id);
        
        $retorno = [
            "resposta_id" => $resposta_id
        ];

        break;

    case "resultado-complete":

        $indiceId = filter_input(INPUT_POST, "indice_id", FILTER_SANITIZE_NUMBER_INT);

        $indice         = questionarios__getIndiceById($indiceId);
        $perguntasCount = questionarios__getCountPerguntasByQuestionariosId($indice['QuestionariosId']);
        $respostasCount = questionarios__getCountRespostasByIndiceId($indiceId);

        $complete = (int)$perguntasCount === (int)$respostasCount;

        $retorno = [
            "complete" => $complete
        ];

    break;

}

echo json_encode($retorno, JSON_FORCE_OBJECT);
die();
