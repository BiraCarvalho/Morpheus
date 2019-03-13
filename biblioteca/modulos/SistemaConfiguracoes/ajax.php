<?php

if ( ! defined( '__ROOT_PATH' ) ) {
    die("Nope,my friend! Wrong path.");
}

require_once __DIR__ . "/config.php";

//Do ajax request
$meta_id     = filter_input(INPUT_POST, "meta_id");
$registro_id = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_NUMBER_INT);

switch ($__operacao) {

    case "imagens-upload":

        $campo = filter_input(INPUT_POST, "campo");
        $slug  = filter_input(INPUT_POST, "slug");

        $uploads     = midias__fileinput_upload($campo, $slug);
        $conteudos   = midias__get_imagens($tabela, $registro_id, $coluna_id);

        $dados = [
            "MidiasImagens" => explode(",", $uploads . "," . $conteudos),
            "Referencia"    => $tabela . ":" . $registro_id
        ];

        dbal__write($dados, $tabela, $registro_id, ["MidiasImagens"]);

        //Atualiza grid de imagens no formulário
        $consulta = "SELECT * FROM Midias WHERE FIND_IN_SET(`Id`,?) ORDER BY Id";
        $imagens  = global__db()->fetchAll($consulta, [$uploads]);
        $include  = "";

        if( $imagens ){
            foreach( $imagens as $imagem ){
                $include .= includes__load_form([
                    "formulario"    => __DIR__ . "/forms/imagens-template",
                    "imagem_id"     => $imagem["Id"],
                    "imagem"        => $imagem,
                    "conteudo_id"   => $registro_id,
                ]);
            }
        }

        $retorno = [
            "uid"       => $registro_id,
            "uploads"   => explode(",", $uploads),
            "conteudos" => $uploads . "," . $conteudos,
            "include"   => $include
        ];

        break;

    case "imagens-remover":

        $imagem_id  = filter_input(INPUT_POST, "imagem_id");

        $imagens = explode(",", midias__get_imagens($tabela, $registro_id, $coluna_id));
        unset($imagens[array_search($imagem_id, $imagens)]);

        $dados = ["MidiasImagens" => $imagens];
        dbal__write($dados, $tabela, $registro_id, ["MidiasImagens"]);

        $count   =  midias__delete($imagem_id);
        $retorno = ["count" => $count ];

        break;

    case 'metadados-remover':

        $count   =  dbal__delete("Id", $meta_id, $tabela."Meta");
        $retorno = ["count" => $count ];

        break;

    case "metadados-adicionar":

        $metadados[$tabela."Id"] = $registro_id;
        $metadados["Tag"]        = filter_input(INPUT_POST, "tag");
        $metadados["Ordem"]      = "0";
        $metadados["Titulo"]     = "";
        $metadados["Valor"]      = "";

        $meta_id = dbal__write($metadados, $tabela."Meta", 0);

        $include = includes__load_form([
            "formulario"	=> __DIR__ . "/forms/meta-template",
            "registro"	 	=> $metadados,
            "meta_id"	 	=> $meta_id,
            "meta_tag"		=> "MetaCampo",
            "fk_id" 	 	=> $registro_id,
            "modulo"        => $__modulo,
            "tabela"        => $tabela,
        ]);

        $retorno = [
            "meta_id" => $meta_id,
            "include" => $include
        ];

        break;

    case "capa-adicionar":

            $capa_id   = filter_input(INPUT_POST, "capa_id");
            $capa_nome = filter_input(INPUT_POST, "capa_nome");

            dbal__write(["MidiasCapa" => $capa_id], $tabela, $registro_id);

            $include = includes__load_form([
                "formulario" => __DIR__ . "/forms/capa-template",
                "capa_id"    => $capa_id,
                "capa_nome"  => $capa_nome,
            ]);

            $retorno = [
                "include" => $include
            ];

        break;

    case "capa-remover":

        $count = dbal__write(["MidiasCapa" => 0], $tabela, $registro_id);
        $retorno = ["count" => $count ];

        break;
}

echo json_encode($retorno, JSON_FORCE_OBJECT);
die();
