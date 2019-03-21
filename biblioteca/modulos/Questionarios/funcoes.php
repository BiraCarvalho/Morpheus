<?php

function questionarios__select_perguntas($registro_id, $tabela)
{
    $consulta  = "SELECT * FROM {$tabela}Perguntas WHERE {$tabela}Id = ?";
    $resultado = global__db()->fetchAll( $consulta , [$registro_id]);

    if( $resultado ){
        return $resultado;
    }

	return false;
}

function questionarios__update_perguntas($request = [], $tabela, $registro_id)
{   
    $prefixo      = "Pergunta_";
    $pergunta_id  = "{$prefixo}Id";
    $foreign_id   = "{$tabela}Id";
    $tabela       = "{$tabela}Perguntas";

    if (!isset($request[$pergunta_id])) {
        return false;
    }

	$count = count($request[$pergunta_id]);

	foreach( $request as $campo => $valor ){
		if( strpos( $campo, $prefixo ) === 0 ){
			for( $campo_idx = 0; $campo_idx < $count; $campo_idx++  ){
                $coluna = str_replace($prefixo,"",$campo);
				$registros[$campo_idx][$coluna] = $valor[$campo_idx] ;
			}
		}
	}

    foreach ( $registros as $registro ) {
        $registro[$foreign_id] = $registro_id;
        dbal__write($registro, $tabela, $registro["Id"]);
    }

}