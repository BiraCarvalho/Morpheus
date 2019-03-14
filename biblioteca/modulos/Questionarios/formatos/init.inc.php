<?php
require_once "config.php";
require_once "funcoes.php";

if( $secao_formato == "questionario-alinhar"  ){
    $conteudo = questionarios__dados_para_pagina( $secao_id, $grupo_id, $slug );
    $conteudo = formatacao__mysql_html("Questionarios", $conteudo);
	$conteudo_id = $conteudo["Id"];
}

?>

<?php if( $slug || $secao_formato == "questionario-alinhar"  ){ ?>
	<?php include_once("pagina.inc.php"); ?>
<?php } ?>