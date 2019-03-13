<?php

function grupos__array( $where = "" ){

	$consulta = "SELECT DISTINCT *
				   FROM Grupos AS grupos
				  WHERE Situacao = '1'
				  {$where}
		 	   ORDER BY Titulo, Ordem";

	return global__db()->fetchAll($consulta);
}

function grupos__titulo_com_ascendentes($grupos = [], $grupo_id)
{
    $grupo_id = (int)$grupo_id;

	foreach ($grupos as $grupo) {
    	//O id do seu pai é ?
		if( $grupo["Id"] == $grupo_id ){
			$titulo = $grupo["Titulo"];
			$pai_id = (int)$grupo["PaiId"];
		}
	}

    //Agora quero saber o nome do meu pai, e do pai dele e ... vou obtendo os titulos até a última geração (root)
	$retorno = "";

	if ( $pai_id ) {
        $retorno .= grupos__titulo_com_ascendentes($grupos, $pai_id) . " :: " . $titulo;
    }

    return $retorno ?: $titulo;
}

function grupos__select(){

	$grupos = grupos__array();

	if( !$grupos ){
	 	return false;
	}

	$retorno = [];

	foreach( $grupos as $grupo ){
		$retorno[$grupo["Id"]] = grupos__titulo_com_ascendentes($grupos, $grupo["Id"]);
	}

	asort($retorno);

	return $retorno;
}


function grupos__array_de_ascendentes( $grupo_id, $retorno = [] ){

	$separador = "";

	$consulta = "SELECT *
                FROM Grupos
                WHERE Id = '{$grupo_id}'
                AND Situacao = '1'
                ORDER BY Ordem, Id";

    $grupo   = global__db()->fetchAssoc($consulta);

	if( $grupo ){
		$retorno[$grupo['Id']] = $grupo['Titulo'];
		return grupos__array_de_ascendentes( $grupo['PaiId'], $retorno );
	}

	return $retorno;
}

function grupos__filtro_sql_in( $grupo_id ){

	$separador = "";
    $retorno   = "";
	$grupos    = grupos__array_de_ascendentes( $grupo_id );

	if( $grupos ){
		$retorno .= " ( ";
		foreach( $grupos as $grupo_id => $grupo_titulo ){
			$retorno  .= $separador." FIND_IN_SET( {$grupo_id}, grpIds )";
			$separador = " OR ";
		}
		$retorno .= " )";
	}

	return $retorno;
}

//--------------------------- legadas --------------------------------

// function grupos__titulo_com_ascendentes( $grupo_id ){
//
// 	global $db; global $db_prefixo;
//
// 	//Qual o nome do meu pai?
// 	$consulta = "SELECT DISTINCT grpId, grpTitulo, grpPai
// 								 FROM {$db_prefixo}Grupos
// 								WHERE grpId = '{$grupo_id}'";
//
// 	$grupo   = $db->GetRow($consulta);
//
// 	//O nome do seu pai ?:
// 	$grupo_titulo =	$grupo["grpTitulo"];
// 	$grupo_pai_id = $grupo["grpPai"];
//
// 	//Agora quero saber o nome do meu pai, e do pai dele e ... vou obtendo os titulos at� a �ltima gera��o (root)
// 	if( !empty( $grupo_pai_id ) ){
//
// 		$grupo_titulo = grupos__titulo_com_ascendentes($grupo_pai_id)." > ".$grupo["grpTitulo"];
//
// 	}
//
// 	return $grupo_titulo;
//
// }

function grupos__array_descendentes_diretos( $grupo_id ){

	global $db; global $db_prefixo;

	$retorno =	[];
	$tabela  = $db_prefixo."Grupos";

	if( $grupo_id === "" ) return $retorno;

	//Obtem a primeira se��o filha obedecendo o campo secOrdem
	$consulta = "SELECT *
								 FROM {$tabela} AS grupos
								WHERE grpPai = '{$grupo_id}'
									AND grpSituacao = '1'
								ORDER BY grpOrdem, grpTitulo, grpId";

	$grupos   = $db->GetArray( $consulta );

	if( !$grupos )	return false;

		foreach( $grupos as $grupo ){
			$retorno[] = [
				"id"     => $grupo['grpId'],
				"slug"   => $grupo['grpSlug'],
				"titulo" => $grupo['grpTitulo']
			];
		}

	return $retorno;
}


function grupos__obtem_infos_pelo_slug( $slug ){

	global $db; global $db_prefixo;

	$retorno =	"";
	$tabela  = $db_prefixo."Grupos";

	$consulta = "SELECT *
								 FROM {$tabela} AS grupos
								WHERE grpSlug = '{$slug}'";

	$grupo   = $db->GetRow( $consulta );

	$infos = [
		"id"        => $grupo["grpId"],
		"titulo"    => $grupo["grpTitulo"],
		"descricao" => $grupo["grpDescricao"],
	];

	return $infos;
}

function grupos__obtem_infos_pelo_id( $grupo_id ){

	global $db; global $db_prefixo;

	$retorno =	"";
	$tabela  = $db_prefixo."Grupos";

	$consulta = "SELECT *
								 FROM {$tabela} AS grupos
								WHERE grpId = '{$grupo_id}'";

	$grupo   = $db->GetRow( $consulta );

	$infos = [
		"slug"      => $grupo["grpSlug"],
		"titulo"    => $grupo["grpTitulo"],
		"descricao" => $grupo["grpDescricao"],
	];

	return $infos;
}

function grupos__array_de_descendentes( $grupo_id, $retorno = [] ){

	global $db; global $db_prefixo;

	$separador = "";
	$tabela    = $db_prefixo."Grupos";

	$consulta = "SELECT *
								 FROM {$tabela} AS grupos
								WHERE grpPai = '{$grupo_id}'
									AND grpSituacao = '1'
								ORDER BY grpId";

	$grupos   = $db->GetArray( $consulta );

	if( $grupos ){
		foreach( $grupos as $grupo ){
			$retorno[$grupo['grpId']] = $grupo['grpTitulo'];
			$retorno = $retorno + grupos__array_de_descendentes( $grupo['grpId'], $retorno );
		}
	}

	return $retorno;
}

function grupos__array_de_descendentes_tabulado( $grupo_id, $retorno = [], $tabulador = "", $nivel_idx = 0 ){

	global $db; global $db_prefixo;

	$separador = "";
	$nivel_idx++;

	$tabela    = $db_prefixo."Grupos";

	$consulta = "SELECT *
								 FROM {$tabela} AS grupos
								WHERE grpPai = '{$grupo_id}'
									AND grpSituacao = '1'
								ORDER BY grpPai, grpOrdem, grpTitulo, grpId";

	$grupos   = $db->GetArray( $consulta );

	if( $grupos ){
		foreach( $grupos as $grupo ){

			$retorno[] = [
				"id"     => $grupo['grpId'],
				"titulo" => $tabulador.$grupo['grpTitulo'],
				"nivel"  => $nivel_idx
			];

			$retorno = $retorno + grupos__array_de_descendentes_tabulado( $grupo['grpId'], $retorno, $tabulador."&nbsp;&nbsp;&nbsp;", $nivel_idx );

		}
	}

	return $retorno;
}
