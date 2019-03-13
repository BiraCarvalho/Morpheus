<?php

function componentes__listas_colunas_tipos($colunas)
{
    foreach ($colunas as $item) {
        $tabela =  $item[1];
        $tabela_colunas = global__show_colunms( $tabela );
        foreach ($tabela_colunas as $tabela_coluna) {
        	foreach ($colunas as $key => $coluna) {
        		if($colunas[$key][0] == $tabela_coluna["Field"] ){
        		  $colunas[$key]["tipo"] = $tabela_coluna["Type"];
        		}
        	}
        }
    }

    return $colunas;
}

function componentes__coluna_tipo($colunas,$coluna_alias){
    foreach($colunas as $coluna){
        if($colunas[2] == $coluna_alias){
            return $colunas["tipo"];
        }
    }
}
