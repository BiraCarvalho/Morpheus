<article>

	<?php if( $conteudo['Titulo'] ){ ?>
	<header>
		<h2><?=$conteudo['Titulo']?></h2>
	</header>
	<?php }?>

	<?=$conteudo['Texto'] ? $conteudo['Texto'] : ''; ?>

	<div class="clearfix"></div>

	<?php require_once __DIR__ . "/parts/pagina-perguntas.part.php" ?>

    <hr />

	<footer class="pagina-rodape text-center">
		<a class="btn btn-lg btn-danger" href="/questionarios-alinhar/modelo?exibir=resultado">Resultado</a>
		<div class="clearfix"></div>
	</footer>

</article>
<hr class="mb-4" />