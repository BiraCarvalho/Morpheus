<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/init.php";

switch ($__operacao) {

    case 'login':

        $login  = filter_input( INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES );
        $senha  = filter_input( INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES );

        if ( !$login || !$senha ){
            admin__logout();
            alert__set( "0", $alerts["informe"]["Contexto"], $alerts["informe"]["Texto"], __NAMESPACE );
            global__redirect( __ADMIN_BASE_URI );
        }

        $consulta  = "SELECT * FROM SistemaUsuarios
                      WHERE Login='{$login}'
            				    AND Senha=MD5('{$senha}')
            				    AND Situacao = '1'
                                AND Arquivado = '0'";

        $resultado = global__db()->fetchAssoc( $consulta );

        if ( !$resultado ) {
            admin__logout();
            alert__set( "0", $alerts["erro"]["Contexto"], $alerts["erro"]["Texto"], __NAMESPACE );
            global__redirect( __ADMIN_BASE_URI );
        }

        autenticacao__set_logon( true );
        autenticacao__set_usuario_uuid( $resultado["uuid"] );

        global__redirect( __ADMIN_BASE_URI );

        break;

    case 'logout':

        admin__logout();
        alert__set( "0", $alerts["logout"]["Contexto"], $alerts["logout"]["Texto"], __NAMESPACE );
        global__redirect( __ADMIN_BASE_URI );

        break;

    default:

        echo includes__load_form([
            "formulario"    => __DIR__ . "/forms/login",
            "modulo"        => $__modulo,
        ]);

        break;

}
