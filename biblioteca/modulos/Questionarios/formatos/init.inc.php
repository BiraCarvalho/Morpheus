<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

$pagina_exibir  = filter_input( INPUT_GET, 'exibir' );
$operacao       = filter_input( INPUT_POST, "op" );
$redirect_url   = "/".$secao_slug."/".$slug."?exibir=resultado";

$cadastro__hash = autenticacao__get_usuario_uuid();
$cadastro       = cadastros__get_usuario( $cadastro__hash );

if( $secao_formato == "questionario-alinhar"  ){
    $conteudo    = questionarios__dados_para_pagina( $secao_id, $grupo_id, $slug );
    $conteudo    = formatacao__mysql_html("Questionarios", $conteudo);
    $conclusoes  = dbal__select_assoc("QuestionariosConclusoes", "CadastrosId", $cadastro["Id"]);
    $conteudo_id = $conteudo["Id"];
}

if( $operacao == "gravar" ){

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