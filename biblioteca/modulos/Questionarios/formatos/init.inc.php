<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

$pagina_exibir  = filter_input(INPUT_GET, 'exibir');

$cadastro__hash = autenticacao__get_usuario_uuid();
$cadastro       = cadastros__get_usuario( $cadastro__hash );

if( $secao_formato == "questionario-alinhar"  ){
    $conteudo = questionarios__dados_para_pagina( $secao_id, $grupo_id, $slug );
    $conteudo = formatacao__mysql_html("Questionarios", $conteudo);
	$conteudo_id = $conteudo["Id"];
}
?>

<?php if( $slug || $secao_formato == "questionario-alinhar" ){ ?>
    <?php if( $pagina_exibir == "resultado"){ ?>
        <?php include_once __DIR__ . "/pagina-resultado.inc.php"; ?>
    <?php } else { ?>
        <?php include_once __DIR__ . "/pagina.inc.php"; ?>
    <?php } ?>
<?php } ?>