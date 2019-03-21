<?php

$operacao = filter_input( INPUT_POST, "op" );

if( $operacao == "gravar" ){

    if( !global__recaptcha_validate() ){
        alert__set( "0",$alerts["errocap"]["Contexto"], $alerts["errocap"]["Texto"], __NAMESPACE );
        return false;
    }

    $_POST["Criacao"] = date("d/m/Y H:i:s");
    $_POST['Agente']  = $_SERVER['HTTP_USER_AGENT'];
    $_POST['Ip']      = $_SERVER['REMOTE_ADDR'];

    $contato_id = dbal__write($_POST, $tabela, 0);
    $contato    = dbal__select_form("Id", $contato_id, $tabela);

    $conteudo = "";
    foreach( $contato as $coluna => $valor ){

        if( $coluna == "Mensagem" ){
            $valor = nl2br($valor);
        }

        $conteudo .= "<p><strong>{$coluna}</strong></p>
                      <p>{$valor}</p>";
    }

    $retorno = email__phpmailer([
        "emailNome"    => "Site - " . config__get_db("dominio"),
        "emailReplay"  => filter_var($contato["Email"], FILTER_SANITIZE_EMAIL),
        "emailPara"    => $email_para,
        "emailBcc"     => $email_bcc,
        "emailAssunto" => $contato["Assunto"],
        "emailMsg"     => email__monta_html( $titulo, $conteudo )
    ]);

    if( $retorno !== true ){
        $alerts["erro"]["Texto"] .= "<br />" . $retorno;
        alert__set( "0", $alerts["erro"]["Contexto"], $alerts["erro"]["Texto"], __NAMESPACE );
        return false;
    }

    alert__set( "0", $alerts["sucesso"]["Contexto"], $alerts["sucesso"]["Texto"], __NAMESPACE );
    global__redirect( $redirect_url );
}
