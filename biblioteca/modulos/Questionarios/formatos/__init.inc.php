<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

$pagina_exibir  = filter_input( INPUT_GET, 'exibir' );
$operacao       = filter_input( INPUT_GET, "op" );

$redirect_url   = "/".$secao_slug."/".$slug."?exibir=resultado";

$cadastro__hash = autenticacao__get_usuario_uuid();
$cadastro       = cadastros__get_usuario( $cadastro__hash );

if( $secao_formato == "questionario-alinhar"  ){
    $conteudo    = questionarios__dados_para_pagina( $secao_id, $grupo_id, $slug );
    $conteudo    = formatacao__mysql_html("Questionarios", $conteudo);
    $conclusoes  = questionario__get_conclusoes($cadastro["Id"], $conteudo["Id"]);
    $conteudo_id = $conteudo["Id"];
}

switch($operacao){

    case "gravar":

        // $_POST["Criacao"] = date("d/m/Y H:i:s");
        // $_POST['Agente']  = $_SERVER['HTTP_USER_AGENT'];
        // $_POST['Ip']      = $_SERVER['REMOTE_ADDR'];

        $conclusoes_id = $conclusoes ? $conclusoes["Id"] : 0;
        $retorno = dbal__write($_POST, "QuestionariosConclusoes", $conclusoes_id);

        if( $retorno !== true ){
            alert__set( "0", "danger", "Não foi possível gravar", __NAMESPACE );
            global__redirect( $redirect_url );
        }

        alert__set( "0", "success", "Salvo com sucesso!", __NAMESPACE );
        global__redirect( $redirect_url );

        break;

    case "novo":
        
        $_POST["CadastrosId"]     = $cadastro["Id"];
        $_POST["QuestionariosId"] = $conteudo["Id"];

        $_POST["Criacao"] = date("d/m/Y H:i:s");
        $_POST['Agente']  = $_SERVER['HTTP_USER_AGENT'];
        $_POST['Ip']      = $_SERVER['REMOTE_ADDR'];
        
        $retorno = dbal__write($_POST, "QuestionariosIndice", 0);
        
        if( $retorno === false ){
            alert__set( "0", "danger", "Não foi possível gravar", __NAMESPACE );
            global__redirect( "/".$secao_slug."/".$slug );
        }

        alert__set( "0", "success", "Salvo com sucesso!", __NAMESPACE );
        global__redirect( "/".$secao_slug."/".$slug );

        break;
}
?>

<?php if( $slug && $secao_formato == "questionario-alinhar" ){ ?>
    <?php if( $pagina_exibir == "resultado"){ ?>
        <?php 
            $resultado_alinhar = questionario__resultado_alinhar((int)$conteudo_id); 
            include_once __DIR__ . "/pagina-resultado.inc.php"; 
        ?>
    <?php } else { ?>
        <?php include_once __DIR__ . "/pagina.inc.php"; ?>
    <?php } ?>
<?php } ?>