<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

$operacao   = global__filter_request("op");
$indiceUuid = global__filter_request("uuid");

$cadastro__hash = autenticacao__get_usuario_uuid();
$cadastro       = cadastros__get_usuario( $cadastro__hash );


switch($operacao){

    case "novo":
        
        $questionario = questionarios__getBySlug($slug);

        $_POST["CadastrosId"]     = $cadastro["Id"];
        $_POST["QuestionariosId"] = $questionario["Id"];

        $_POST["Criacao"] = date("d/m/Y H:i:s");
        $_POST['Agente']  = $_SERVER['HTTP_USER_AGENT'];
        $_POST['Ip']      = $_SERVER['REMOTE_ADDR'];
        
        $indiceId = dbal__write($_POST, "QuestionariosIndice", 0);
        
        if( $indiceId !== false ){
            $indice = questionarios__getIndiceById($indiceId);
            sessions__set("QUESTIONARIO__INDICE_UUID", $indice['uuid']);
            global__redirect( "/".$secao_slug."/".$slug );
        }

        alert__set("0",$alertsMessages["error"]["Contexto"], $alertsMessages["error"]["Texto"], __NAMESPACE);
        global__redirect("/dashboard");
        
        break;
}


if( $secao_formato == "dashboard"){
    require_once __DIR__ . "/dashboard/init.inc.php";
}

if( $secao_formato == "formulario"){
    require_once __DIR__ . "/formulario/init.inc.php";
}