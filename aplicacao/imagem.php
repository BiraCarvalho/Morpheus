<?php

require_once ('init.php');

$source  = filter_input( INPUT_GET, "src" );

if(!$source){
    die("Nenhuma imagem informada.");
};

$destino = filter_input( INPUT_GET, "dst" ) ?: NULL;
$width   = filter_input( INPUT_GET, "w", FILTER_SANITIZE_NUMBER_INT ) ?: 1024;
$height  = filter_input( INPUT_GET, "h", FILTER_SANITIZE_NUMBER_INT ) ?: 1024;

$source  = __ROOT_PATH . $source;

if( !is_file($source) ){
   $source = __DADOS_PATH . "/default.png";
   $resource = imagem__crop( $source, $width, $height );
}

if( $source ){
    $resource = imagem__crop( $source, $width, $height );
}

if( $destino ){
    $destino = __ROOT_PATH . $destino;
}

if( $resource ){
    imagem__load( $resource, $destino );
}

die("Imagem não encontrada ou não informada corretamente.");
