<article>

	<?php if( $conteudo['Titulo'] ){ ?>
	<header>
		<h2><?=$conteudo['Titulo']?></h2>
	</header>
	<?php }?>

	<?=$conteudo['Texto'] ? $conteudo['Texto'] : ''; ?>

	<div class="clearfix"></div>

	<?php require_once("parts/pagina-meta-accordion.part.php");?>

    <hr />

	<footer class="pagina-rodape">
        <div class="clearfix"></div>
	</footer>

</article>
