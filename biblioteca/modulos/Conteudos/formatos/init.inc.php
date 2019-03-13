<?php
require_once "config.php";
require_once "funcoes.php";

if( substr_count( $secao_formato, "conteudos-lista" ) || $secao_formato == "conteudos-pagina"  ){
    $conteudo = conteudos__dados_para_pagina( $secao_id, $grupo_id, $slug );
    $conteudo = formatacao__mysql_html("Conteudos", $conteudo);
	$conteudo_id = $conteudo["Id"];
}

if( substr_count( $secao_formato, "conteudos-lista" ) ){
    $lista_offset = $secao_formato == "conteudos-lista-slim" ? $lista_offset_slim : $lista_offset;
    $lista_offset = $secao_formato == "conteudos-lista-grid" ? $lista_offset_grid : $lista_offset;
	$linhas_count = conteudos__total_de_linhas_da_lista( $secao_id, $grupo_id, $slug );
	$pagina_total = ceil( $linhas_count / $lista_offset );
	$pagina_id    = ( $pagina_id > $pagina_total ) ? 1 : $pagina_id;
	$pagina_limit = ( $pagina_id - 1 ) * $lista_offset;
	$conteudos    = conteudos__dados_para_lista( $secao_id, $grupo_id, $slug, $pagina_limit, $lista_offset, $lista_order );
}
?>

<?php if( $slug || $secao_formato == "conteudos-pagina"  ){ ?>
	<?php include_once("pagina.inc.php"); ?>
<?php } ?>

<?php if( substr_count( $secao_formato, "conteudos-lista" ) ){ ?>
<section class="conteudos-lista">

	<h2 class="hidden">Lista de Conteúdos</h2>

	<?php if( $secao_formato == "conteudos-lista" ){ ?>
		<?php include_once("lista.inc.php"); ?>
	<?php } ?>

	<?php if( $secao_formato == "conteudos-lista-slim" ){ ?>
		<div class="conteudos-lista-slim" >
		<?php include_once("lista-slim.inc.php"); ?>
		</div>
	<?php } ?>

	<?php if( $secao_formato == "conteudos-lista-grid" ){ ?>
		<div class="conteudos-lista-grid" >
		<?php include_once("lista-grid.inc.php"); ?>
		</div>
	<?php } ?>

</section>
<?php } ?>
