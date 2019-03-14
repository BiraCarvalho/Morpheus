<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";

echo includes__load_admin_part( "painel/header",
    [
        "operacao"      => $__operacao,
        "modulo"        => $__modulo,
        "modulo_titulo" => $__modulos[$__modulo]["Titulo"],
    ]
);

switch ($__operacao) {

    case 'novo':

        echo includes__load_form([
            "formulario"    => __DIR__ . "/forms/init",
            "resultado"     => dbal__select_form($coluna_id, $__registro_id, $tabela),
            "registro_id"   => $__registro_id,
            "operacao"      => $__operacao,
            "modulo"        => $__modulo,
            "tabela"        => $tabela,
        ]);

        break;

    case 'editar':

        echo includes__load_form([
            "formulario"    => __DIR__ . "/forms/init",
            "resultado"     => dbal__select_form($coluna_id, $__registro_id, $tabela),
            "registro_id"   => $__registro_id,
            "operacao"      => $__operacao,
            "modulo"        => $__modulo,
            "tabela"        => $tabela,
        ]);

        break;

    case "salvar":

        $_POST["Slug"] = dbal__set_slug( $tabela, $_POST["Titulo"], $_POST["Slug"], $__registro_id );
        $__registro_id = dbal__write($_POST, $tabela, $__registro_id, ["Secoes","Grupos","Midias"]);

        dbal__update_meta($_POST, $tabela, $__registro_id);

        global__redirect( __ADMIN_BASE_URI . "/".admin__set_url($__modulo, "editar", $__registro_id) );

        break;

    case "clonar":

        $clone     = dbal__select_form($coluna_id, $__registro_id, $tabela);

        $clone["Situacao"] = 0;
        $clone["Privado"]  = 0;
        $clone["Destaque"] = 0;
        $clone["Ordem"]    = 0;

        $__registro_id = dbal__write($clone, $tabela, 0);
        dbal__set_slug( $tabela, $__registro_id, $clone["Titulo"], $clone["Slug"] );

        $metadados = dbal__select_meta($__registro_id, "MetaCampo", $tabela);

        if( $metadados ){
            foreach ( $metadados as $metadado ) {
                $metadado[$tabela."Id"] = $__registro_id;
                dbal__write($metadado, $tabela."Meta", 0);
            }
        }

        global__redirect( __ADMIN_BASE_URI . "/".admin__set_url($__modulo) );

        break;


    case "arquivar":

        $arquivar  = dbal__select_form($coluna_id, $__registro_id, $tabela);

        $arquivar["Situacao"]  = 0;
        $arquivar["Arquivado"] = 1;

        $__registro_id = dbal__write($arquivar, $tabela, $__registro_id);
        global__redirect( __ADMIN_BASE_URI . "/".admin__set_url($__modulo) );

        break;

    case "restaurar":

        $restaurar = dbal__select_form($coluna_id, $__registro_id, $tabela);

        $restaurar["Situacao"]  = 0;
        $restaurar["Arquivado"] = 0;

        $__registro_id = dbal__write($restaurar, $tabela, $__registro_id);
        global__redirect( __ADMIN_BASE_URI . "/".admin__set_url($__modulo) );

        break;

    case 'excluir':

        $imagens = explode(",", midias__get_imagens($tabela, $__registro_id, $coluna_id));

        foreach( $imagens as $imagem_id ){
            midias__delete($imagem_id);
        }

        $resultado = dbal__delete("Id", $__registro_id, $tabela);
        global__redirect( __ADMIN_BASE_URI . "/".admin__set_url($__modulo) );

        break;

    default:

        $lista_config = [
            "default" => [
                "order_coluna" => "ID",
                "order"        => "ASC",
                "limit"        => 20
            ],
            "colunas" => [
                [ "Id",        $tabela,  "ID",        ""                                      ,"text-right"],
                [ "Titulo",    $tabela,  "TÍTULO",    ""                                      ,""],
                [ "Data",      $tabela,  "DATA",      ""                                      ,""],
                [ "Ordem",     $tabela,  "ORDEM",     ""                                      ,"text-right"],
                [ "Situacao",  $tabela,  "SITUACAO",  ["0" => "Rascunho", "1" => "Publicado"] ,""],
                [ "Privado",   $tabela,  "PRIVADO",   ["0" => "Não", "1" => "Sim"]            ,""],
                [ "Destaque",  $tabela,  "DESTAQUE",  ["0" => "Não", "1" => "Sim"]            ,""],
            ],
            "filtros" => [
                "secoes" => true,
                "grupos" => true
            ],
            "opcoes" => [
                "checkbox"    => false, //TODO Não implementada nenhuma funcionalidade ainda, manter dessativado por enquanto.
                "controles"   => true,
                "coluna_link" => "Titulo",
                "arquivar"    => true,
                "clonar"      => false, //TODO Falta implementar a clonagem das mídias vinculadas. Manter desativado até que seja feito.
                "filtros"     => ""
            ]
        ];

        echo includes__load_componente("listas",
            [
                "namespace" => __NAMESPACE,
                "modulo"    => $__modulo,
                "template"  => "default",
                "label"     => strtoupper($__modulo),
                "tabela"    => $tabela,
                "config"    => $lista_config
            ]
        );

        break;
}
