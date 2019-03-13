<?php

require_once ('init.php');

$arquivo_prefixo = !empty($_GET['p']) ? $_GET['p']                                 : 0 ;
$arquivo_path    = !empty($_GET['f']) ? config__($arquivo_prefixo."Path").$_GET['f'] : 0 ;
$conteudo_slug   = !empty($_GET['s']) ? $_GET['s']                                 : "";

arquivos__download( $arquivo_prefixo, $arquivo_path, $conteudo_slug );
