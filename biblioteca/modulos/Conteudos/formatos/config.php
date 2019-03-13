<?php

$lista_offset      = 12;
$lista_offset_grid = 12;
$lista_offset_slim = 99;

$lista_order       = "Data DESC, Id DESC";
$lista_order_grid  = "Data DESC, Id DESC";
$lista_order_slim  = "Data DESC, Id DESC";

$lista_thumb_w = 360;
$lista_thumb_h = 210;

$galeria_thumb_w  = 240;
$galeria_thumb_h  = 240;

$conteudo_capa = [
    "colunas" => [
        "capa"      => "MidiasCapa",
        "galeria"   => "MidiasImagens",
        "texto"     => "Texto",
        "video_url" => "Video"
    ],
    "tabela_midias"  => "Midias",
    "imagem_default" => true,
    "imagem_path"    => __MIDIAS_BASE_URI,
    "dimensoes"      => $lista_thumb_w,
    "imagem_height"  => $lista_thumb_h,
];
