<article>
	
	<header class="d-none">
		<h2 id="pagina--titulo"><?=$conteudo['Titulo']?></h2>
	</header>

	<?=$conteudo['Texto'] ? $conteudo['Texto'] : ''; ?>

	<div class="clearfix"></div>

	<?php require_once __DIR__ . "/parts/pagina-perguntas.part.php" ?>

    <hr />

	<footer class="pagina-rodape text-center">
		<a class="btn btn-lg btn-danger" href="/<?=$secao_slug?>/<?=$slug?>?exibir=resultado">Resultado</a>
		<div class="clearfix"></div>
	</footer>

</article>
<hr class="mb-4" />