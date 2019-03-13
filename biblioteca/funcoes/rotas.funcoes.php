<?php

function rotas__get_config($rota)
{
    global $__APLICACAO_CONFIG;

    if( !$rota ){
        return $__APLICACAO_CONFIG["Rotas"];
    }

    if( array_key_exists( $rota, $__APLICACAO_CONFIG["Rotas"] ) ){
        return $__APLICACAO_CONFIG["Rotas"][$rota];
    }

    return false;
}

function rotas__get_secoes(){

    $consulta = "SELECT DISTINCT *
				   FROM Secoes AS secoes
				  WHERE Situacao = '1'
		 	   ORDER BY Titulo, Ordem";

	$secoes = global__db()->fetchAll($consulta);

    $retorno = [];

    foreach($secoes as $secao){
        $retorno[$secao["Slug"]] = $secao;
        $retorno[$secao["Slug"]]["Uri"]  = __SITE_PATH . "/" . $secao["Uri"];
    }

    return $retorno;
}

function rotas__get_all(){
    global $__APLICACAO_CONFIG;
    return $__APLICACAO_CONFIG["Rotas"] + rotas__get_secoes();
}

function rotas__uri($request, $rotas)
{
    if( !$request["secao"] ){
        $request["secao"] = __SITE_ROTA_DEFAULT;
    }

    $rota = rotas__validacao($request["secao"],$rotas);

    if ($request["secao"] == "404"){
        http_response_code(404);
    }

    return [
        "Diretorio" => !empty($rota["Diretorio"]) ? $rota["Diretorio"] : NULL,
        "Uri"       => $rota["Uri"]
    ];
}

function rotas__validacao($rota, $rotas)
{
    $registro = @$rotas[$rota];

    if (!$rota || !file_exists($registro["Uri"])){
        rotas__redir("404", 404);
    }

    return $registro;
}

function rotas__redir($rota, $code = 301)
{
    http_response_code($code);
    global__redirect($rota);
}

function rotas__parser()
{
    $request = filter_input( INPUT_GET, "rota" );
    $request = str_replace( "index.php", "", $request );
    $request = trim( $request, "/" );

    $parametros = explode( "/", $request );

    $parametro_pagina_key = array_search("pagina", $parametros);
    $pagina_id     = 1;

    if( $parametro_pagina_key ){        

        if( array_key_exists($parametro_pagina_key + 1, $parametros) ){
            $pagina_id = (int)$parametros[ $parametro_pagina_key + 1 ];
            unset( $parametros[ $parametro_pagina_key + 1 ] );
        }

        unset( $parametros[ $parametro_pagina_key ] );
	}

    $parser["secao"]     = isset($parametros[0]) ? $parametros[0] : "";
    $parser["slug"]      = isset($parametros[1]) ? $parametros[1] : "";
    $parser['pagina_id'] = $pagina_id;

    return $parser;
}
