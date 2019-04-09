<?php

$operacao = filter_input( INPUT_POST, "op" );

if( $operacao == "gravar" ){

    if( !global__recaptcha_validate() ){
        alert__set( "0",$alerts["errocap"]["Contexto"], $alerts["errocap"]["Texto"], __NAMESPACE );
        return false;
    }

    $cadastroEmail = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL);

    if(dbal__select_assoc($tabela, "Email", $cadastroEmail) !== false ){
        alert__set( "0",$alerts["email-duplicado"]["Contexto"], $alerts["email-duplicado"]["Texto"], __NAMESPACE );
        return false;       
    }

    $_POST["Criacao"] = date("d/m/Y H:i:s");
    $_POST['Agente']  = $_SERVER['HTTP_USER_AGENT'];
    $_POST['Ip']      = $_SERVER['REMOTE_ADDR'];
   
    $senha          = filter_input(INPUT_POST,"Senha");
    $_POST["Senha"] = password_hash($senha,PASSWORD_DEFAULT);

    $cadastro_id = dbal__write($_POST, $tabela, 0);
    $cadastro    = dbal__select_form("Id", $cadastro_id, $tabela);

    if( $cadastro_id === false ){
        alert__set( "0", $alerts["erro"]["Contexto"], $alerts["erro"]["Texto"], __NAMESPACE );
        return false;
    }

    alert__set( "0", $alerts["sucesso"]["Contexto"], $alerts["sucesso"]["Texto"], __NAMESPACE );
    global__redirect( $redirect_url );
}
