<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../funcoes.php";

$redirect_request = global__filter_request("redirect");
$redirect_uri     = $redirect_request ?: $redirect_uri;
$autenticacao_uri = $redirect_request ? "{$autenticacao_uri}?redirect={$redirect_uri}" : $autenticacao_uri ;

switch ($slug) {

    case 'login':

        $login  = filter_input( INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES );
        $senha  = filter_input( INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES );

        if ( !$login || !$senha ){
            cadastros__logout();
            alert__set( "0", $alerts["informe"]["Contexto"], $alerts["informe"]["Texto"], __NAMESPACE );
            global__redirect($autenticacao_uri);
        }

        $logon = cadastros__logon($login, $senha);

        if ( !$logon["check"] ) {
            cadastros__logout();
            alert__set( "0", $alerts["erro"]["Contexto"], $alerts["erro"]["Texto"], __NAMESPACE );
            global__redirect($autenticacao_uri);
        }

        autenticacao__set_logon(true);
        autenticacao__set_usuario_uuid($logon["cadastro"]["uuid"]);
        //echo $redirect_uri;
        global__redirect($redirect_uri);

        break;

    case 'logout':

        cadastros__logout();
        alert__set( "0", $alerts["logout"]["Contexto"], $alerts["logout"]["Texto"], __NAMESPACE );
        global__redirect($autenticacao_uri);

        break;

    default:

        if( autenticacao__get_logon() ){
            global__redirect($cliente_uri);
        }

        break;
}
