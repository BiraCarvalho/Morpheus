<?php

$__request      = rotas__parser();
$__rotas        = rotas__get_all();
$__rota         = rotas__uri( $__request, $__rotas );
$__query_string = urlencode(strstr($_SERVER['QUERY_STRING'],"&")) ?: "";

switch( $__rota["Diretorio"] ){

    default:
        //Diretorio Site ou NULL
        echo templates__load_site( $__rota["Uri"] ,[
            "secoes"       => $__rotas,
            "rota"         => $__request,
            "query_string" => $__query_string
        ]);
        break;

    case "Aplicacao":
        echo includes__load( $__rota["Uri"] ,[
            "secoes"       => $__rotas,
            "rota"         => $__request,
            "query_string" => $__query_string
        ]);
        break;

    case "Admin":
        http_response_code(301);
        global__redirect( $__rota["Uri"] );
        break;
}
