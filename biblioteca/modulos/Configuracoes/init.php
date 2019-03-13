<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

echo includes__load_admin_part( "painel/header",
    [
        "operacao"      => "ocultar-botao-novo",
        "modulo"        => $__modulo,
        "modulo_titulo" => $__modulos[$__modulo]["Titulo"],
    ]
);

switch ($__operacao) {

    case "salvar":

        $registro["Alteracao"]          = date("d/m/Y H:i:s");
        $registro["AlteracaoUsuarioId"] = $__usuario["Id"];

        foreach( $_POST as $key => $value ){

            $registro = [
                "uuid"  => $key,
                "Valor" => $value
            ];

            $prepare = dbal__prepare_post( $registro, $tabela, [] );
            global__db()->update($tabela, $prepare, [ "uuid" => $key ] );

        }

        global__redirect( __ADMIN_BASE_URI . "/".admin__set_url($__modulo, "editar", $__registro_id) );

        break;

    default:

        echo includes__load_form([
            "formulario"    => __DIR__ . "/forms/init",
            "resultado"     => "",
            "operacao"      => $__operacao,
            "modulo"        => $__modulo,
            "tabela"        => $tabela,
        ]);

        break;
}
