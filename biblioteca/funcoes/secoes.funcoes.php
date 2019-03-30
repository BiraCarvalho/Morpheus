<?php

function secoes__array( $where = "" ){

	$consulta = "SELECT DISTINCT *
				   FROM Secoes AS secoes
				  WHERE Situacao = '1'
				  {$where}
		 	   ORDER BY Titulo, Ordem";

	return global__db()->fetchAll($consulta);
}

function secoes__titulo_com_ascendentes($secoes = [], $secao_id)
{
    $secao_id = (int)$secao_id;
    $pai_id   = NULL;
    $titulo   = "";

	foreach ($secoes as $secao) {
    	//O id do seu pai é ?
		if( $secao["Id"] == $secao_id ){
			$titulo = $secao["Titulo"];
			$pai_id = (int)$secao["PaiId"];
		}
	}

	$retorno   = "";
    $separador = "::";

	if ( $pai_id && $pai_id != $secao["Id"] ) {
        $retorno .= secoes__titulo_com_ascendentes($secoes, $pai_id) . $separador . $titulo;
    }

    return $retorno ? trim($retorno, $separador) : $titulo;
}

function secoes__select($modulo = "", $where = ""){

	$secoes = secoes__array($where);

	if( !$secoes ){
	 	return false;
	}

	$retorno = [];

	foreach( $secoes as $secao ){
		if( $secao["Modulo"] == $modulo || !$modulo ){
			$retorno[$secao["Id"]] = secoes__titulo_com_ascendentes($secoes, $secao["Id"]);
		}
	}

	asort($retorno);

	return $retorno;
}


function secoes__array_de_descendentes( $secao_id, $retorno = [] ){

	$separador = "";
    $secao_id  = (int)$secao_id;

	$consulta = "SELECT *
				FROM Secoes as Secoes
				WHERE PaiId = '{$secao_id}'
                AND Situacao = '1'
				ORDER BY Id";

	$secoes   = global__db()->fetchAssoc( $consulta );

	if( $secoes ){
		foreach( $secoes as $secao ){
			$retorno[$secao['Id']] = $secao['Titulo'];
			$retorno = $retorno + secoes__array_de_descendentes( $secao['Id'], $retorno );
		}
	}

	return $retorno;
}

function secoes__array_de_ascendentes( $secao_id, $retorno = [] ){

	$separador = "";
    $secao_id  = (int)$secao_id;

	$consulta = "SELECT *
    			FROM Secoes AS secoes
    			WHERE Id = '{$secao_id}'
    			AND Situacao = '1'
    			ORDER BY Ordem, Id";

	$secao   = global__db()->fetchAssoc( $consulta );

	if( $secao ){
		$retorno[$secao['Id']] = $secao['Titulo'];
		return secoes__array_de_ascendentes( $secao['PaiId'], $retorno );
	}

	return $retorno;
}

function secoes__filtro_sql_in( $secao_id ){

	$separador = "";
    $retorno   = "";
    $secao_id  = (int)$secao_id;
	$secoes    = secoes__array_de_ascendentes( $secao_id );

	if( $secoes ){
        $retorno .= " ( ";
		foreach( $secoes as $secao_id => $secao_titulo ){
			$retorno  .= $separador." FIND_IN_SET( {$secao_id}, Secoes )";
			$separador = " OR ";
		}
		$retorno .= " )";
	}

	return $retorno;
}



//--------------------------- legadas --------------------------------

function secoes__quantos_filhos($secao_id)
{
    $secao_id = (int)$secao_id;

    $consulta = "SELECT count(Id) AS filhosCount
				   FROM Secoes
				  WHERE PaiId='{$secao_id}'";

    $resultado = global__db()->fetchColumn($consulta);

    if (!$resultado) {
        return false;
    }

    return $resultado[0];
}

function secoes__titulo($secao_id)
{
    $secao_id  = (int)$secao_id;
    $resultado = secoes__infos($secao_id, "Titulo");

    if (!$resultado) {
        return false;
    }

    return $resultado;
}

function secoes__slug($secao_id)
{
    $secao_id  = (int)$secao_id;
    $resultado = secoes__infos($secao_id, "Slug");

    if (!$resultado) {
        return false;
    }

    return $resultado;
}

function secoes__infos($secao_id, $coluna)
{
    $secao_id = (int)$secao_id;
    $coluna   = addslashes($coluna);

    $consulta  = "SELECT {$coluna} FROM Secoes WHERE `Id`='{$secao_id}'";
    $resultado = global__db()->fetchColumn($consulta);

    if (!$resultado) {
        return false;
    }

    return $resultado[$coluna];
}

function secoes__infos_tudo($secao_id)
{
    $secao_id = (int)$secao_id;

    $consulta  = "SELECT * FROM Secoes WHERE `Id`='{$secao_id}'";
    $resultado = global__db()->fetchColumn($consulta);

    if (!$resultado) {
        return false;
    }

    return $resultado;
}


function secoes__menu_descendentes($secao_id, $grupos_filtro = false, $rota = [], $rotas = [], $nivel_idx = 0, $nivel_limite = 1, $atributos = [])
{
    $retorno = "";
    $tabela  = "Secoes";

    if ($grupos_filtro) {
        $grupos_filtro = " OR {$grupos_filtro}";
    }

    $consulta = "SELECT *,
				 ( SELECT count(Id) FROM Secoes AS filhos WHERE filhos.PaiId=secoes.Id ) as filhosCount
				 FROM {$tabela} AS secoes
				WHERE PaiId = '{$secao_id}'
					AND Situacao = '1'
				  AND ( secoes.Grupos IS NULL OR secoes.Grupos = '' {$grupos_filtro} )
		 ORDER BY Ordem, Id, Titulo";

    $secoes = global__db()->fetchAll($consulta);

    $nivel_idx++;

    if ($secoes) {
        $attr_ul = @$atributos["ul"] ? $atributos['ul'] : "";
        $attr_li = @$atributos["li"] ? $atributos['li'] : "";
        $atrr_a  = @$atributos["a"]  ? $atributos['a']  : "";

        $retorno .= "<ul {$attr_ul} >";

        foreach ($secoes as $secao) {

            $item_ativo   = $secao["Id"] == $rotas[$rota["secao"]]["Id"] ? " active" : "";

            $caret    = "";
            $ul_class = "";
            $li_class = "";
            $a_class  = "";
            $a_data   = "";

            if ($secao['filhosCount'] && $nivel_limite >= $nivel_idx) {
                $caret     = "<span class=\"caret\"></span>";
                $li_class  = " tem-filhos ";
            }

            if ($secao['filhosCount'] && $nivel_limite >= $nivel_idx && !empty($attr_ul)) {
                $ul_class  = " class=\"dropdown-menu\" ";
                $li_class .= " dropdown ";
                $a_class   = " dropdown-toggle ";
                $a_data    = " data-toggle=\"dropdown\" ";
            }

            $href = "/{$secao['Slug']}";

            // if ((int)$modulo["Id"] === "1") {
            //     $href = $secao["secURL"];
            // }

            $retorno .= "<li class=\"nivel-{$nivel_idx}{$li_class}{$item_ativo}\" >";
            $retorno .= "<a href=\"{$href}\" {$a_class} {$a_data} target=\"{$secao['Target']}\" >{$secao['Titulo']}{$caret}</a>";

            if ($secao['filhosCount'] && $nivel_limite >= $nivel_idx) {
                $retorno .= secoes__menu_descendentes($secao['Id'], $secao_id, $rota, $rotas, $nivel_idx, $nivel_limite, [ "ul" => $ul_class ]);
            }

            $retorno .= '</li>';
        }

        $retorno .= "</ul>";
    }

    return $retorno;
}

function secoes__menu_descendentes_diretos($secao_id, $class = [], $exibir_imagem = false)
{
    $tabela  = "Secoes";
    $retorno = "";

    $class_ul = $class["ul"] ? " class=\"{$class['ul']}\"" : "";
    $class_li = $class["li"] ? " class=\"{$class['li']}\"" : "";
    $class_a  = $class["a"]  ? " class=\"{$class['a']}\""  : "";

    $consulta = "SELECT *
				   FROM {$tabela} AS secoes
				  WHERE PaiId = '{$secao_id}'
					AND Situacao = '1'
		ORDER BY Ordem, Titulo, Id";

    $secoes   = global__db()->fetchAssoc($consulta);

    if (!$secoes) {
        return false;
    }

    $retorno .= "<ul {$class_ul}>";
    foreach ($secoes as $secao) {
        $href = $secao["Id"] == 1 ? $secao["URL"] : "/".$secao['Slug'];
        $retorno .= "<li {$class_li}>";
        $retorno .= "<a  {$class_a} href=\"{$href}\">{$secao['Titulo']}</a>";
        $retorno .= "</li>";
    }
    $retorno .= "</ul>";

    return $retorno;
}


function secoes__todos_os_descendentes($secao_id)
{
    $tabela = "Secoes";

    $consulta = "SELECT secoes.Id, secoes.Slug, secoes.smoId, secoes.PaiId
								 FROM {$tabela} AS secoes
								WHERE ( PaiId IS NOT NULL OR PaiId<>0 )
									AND PaiId = '{$secao_id}'
								ORDER BY Ordem, Id;";

    $secoes   = global__db()->GetArray($consulta);

    if (!$secoes) {
        return false;
    }

    foreach ($secoes as $secao) {
        $_filhas[] = [
            "secao_id"     => $secao["Id"],
            "secao_slug"   => $secao["Slug"],
            "modulo"       => $secao["Modulos"]
        ];

        $retorno = secoes__todos_os_descendentes($secao['Id']);

        if (!empty($retorno)) {
            $_filhas = array_merge($_filhas, $retorno);
        }
    }

    return $_filhas;
}
