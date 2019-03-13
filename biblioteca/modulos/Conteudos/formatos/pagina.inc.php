<article>

	<?php if( $conteudo['Titulo'] ){ ?>
	<header>

		<h2><?=$conteudo['Titulo']?></h2>

		<?php if($conteudo['Data'] && (int)$conteudo['Data'] > 0 ){ ?>
			<p class="data" ><strong>Publicado em :</strong> <?=formatacao__data_ptBR($conteudo['Data'])?></p>
		<?php } ?>

		<?php if($conteudo['Autor']){?>
			<p class="autor" ><strong>Autor :</strong> <?=$conteudo['Autor']?></p>
		<?php } ?>

		<?php if($conteudo['Fonte']){ ?>
			<p class="fonte" >
				<strong>Fonte :</strong> <?=$conteudo['Fonte']?> - <a target="_blank" href="<?=$conteudo['URL']?>" class="url"><?=$conteudo['URL']?></a>
			</p>
		<?php } ?>

		<?php if( $conteudo['MidiasAnexo'] ){ ?>
			<?php include ("parts/pagina-download.part.php");?>
			<div class="clearfix"></div>
			<br />
		<?php } ?>

	</header>
	<?php }?>

	<?=$conteudo['Texto'] ? $conteudo['Texto'] : ''; ?>
	<div class="clearfix"></div>

	<?php require_once("parts/pagina-meta-accordion.part.php");?>

	<?php	if( $conteudo['Video'] ) { ?>
	<div class="video embed-responsive embed-responsive-16by9" >
		<?php
			$video_url = $conteudo['Video'];
			include_once("parts/pagina-video.part.php");
		?>
	</div>
	<?php	} ?>

	<?php if( $conteudo['Galeria'] && $conteudo['MidiasImagens'] ){ ?>
		<?php include_once("parts/pagina-galeria.part.php");?>
	<?php } ?>
    <hr />
	<footer class="pagina-rodape">

		<div class="share-buttons pull-right">
			<?=helpers__share_buttons( $secao_slug, $slug, $conteudo['Titulo'] );?>
		</div>
        <div class="clearfix"></div>
	</footer>

</article>
