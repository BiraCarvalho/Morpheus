<?php

function midias__get_imagens($tabela, $registro_id, $coluna_id = "Id"){
    $consulta  = "SELECT MidiasImagens FROM {$tabela} WHERE `{$coluna_id}` = ?";
    return global__db()->fetchColumn( $consulta , [ $registro_id ]);
}

function midias__fileinput_upload($campo, $slug){

    if (empty($_FILES[$campo])) {
        return ['error'=>'Não existem arquivos para upload.'];
    }

    $arquivos = $_FILES[$campo];
    $total    = count($arquivos['tmp_name']);
    $successo = null;

    for($arquivo_idx = 0; $arquivo_idx < $total; $arquivo_idx++){

        $info          = pathinfo($arquivos["name"][$arquivo_idx]);
        $nome_original = global__clean_url($info["filename"]) . "." . $info["extension"];
        $nome_novo     = $slug . "-" . uniqid() . "." . $info["extension"];
        $destino       = __MIDIAS_PATH . DIRECTORY_SEPARATOR . $nome_novo;

        if(move_uploaded_file($arquivos['tmp_name'][$arquivo_idx], $destino)) {

            $successo = true;
            $dados[$arquivo_idx] = [
                "Nome"         => $nome_novo,
                "NomeOriginal" => $nome_original,
                "MimeType"     => mime_content_type($destino),
                "Ordem"        => $arquivo_idx+1
            ];

        } else {
            $successo = false;
            break;
        }

    }

    if ($successo === true) {

        $midias    = "";
        $separador = "";

        foreach( $dados as $dado ){
            $registro_id = dbal__write($dado, "Midias", 0);
            $midias .= $separador . $registro_id;
            $separador = ",";
        }

        $retorno = $midias;

    } elseif ($successo === false) {
        $retorno = ["error"=>"Não foi possível completar o upload de todos os arquivos"];
    } else {
        $retorno = ["error"=>"Nenhum arquivo foi processado!"];
    }

    return $retorno;
}

function midias__delete($midia_id){

        $midia = dbal__select_id("Midias",$midia_id);

		if( !$midia ){
			return false;
		}

        $arquivo = __MIDIAS_PATH . DIRECTORY_SEPARATOR . $midia["Nome"];

		if( !file_exists( $arquivo ) ){
            return false;
        }

		unlink( $arquivo );

        return dbal__delete("Id", $midia_id, "Midias");

}
