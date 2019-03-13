<?php
function sistemaConfiguracoes__grupos()
{
    $consulta = "SELECT *
				   FROM ConfiguracoesGrupos
				  WHERE Situacao = '1'
		 	   ORDER BY Id, Ordem, Slug";

	$grupos  = global__db()->fetchAll($consulta);
    $retorno = [];

    foreach( $grupos as $grupo ){
        $retorno[$grupo["Id"]] = $grupo["Titulo"];
    }

    return $retorno;
}
