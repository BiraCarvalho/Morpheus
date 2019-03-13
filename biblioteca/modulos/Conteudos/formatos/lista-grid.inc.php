<?php if( $conteudos ) foreach( $conteudos as $conteudo ){	?>
<?php
$conteudo              = formatacao__mysql_html("Conteudos", $conteudo);
$href                  = "/".$secao_slug."/".$conteudo["Slug"]."/";
$ativar_resumo         = $conteudo['Resumo'] || $conteudo['Texto'];
$ativar_link_conteudo  = $conteudo['Texto'] ||  $conteudo['MidiasImagens'] || $conteudo['Video'];
$ativar_botao_conteudo = $conteudo['Texto'] ||  $conteudo['MidiasImagens'];
$ativar_botao_video    = $conteudo['Video'] && !$conteudo['Texto'] && !$conteudo['MidiasImagens'];
$ativar_botao_download = !empty( $conteudo['ArquivoAnexo'] );
$imagem_source         = imagens__capa( $conteudo, $conteudo_capa );
?>
<article>

    <?php if( $imagem_source ){ ?>
        <?php if( $ativar_link_conteudo ){ ?><a href="<?=$href?>" ><?php } ?>
        <figure style="background-image: url(<?=$imagem_source?>)" >
            <figcaption class="hidden"><?=$conteudo['Titulo']?></figcaption>
        </figure>
        <?php if( $ativar_link_conteudo ){ ?></a><?php } ?>
    <?php } ?>

	<header>
		<?php if( $ativar_link_conteudo ){ ?><a href="<?=$href?>" ><?php } ?>
			<h2><?=$conteudo['Titulo']?></h2>
		<?php if( $ativar_link_conteudo ){ ?></a><?php } ?>

		<?php if( $conteudo['Fonte'] ){ ?>
			 <p><i class="glyphicon glyphicon-copyright-mark"></i>&nbsp;<?=$conteudo['Fonte']?></p>
		<?php }?>

		<div class="resumo" >
			<?php if( $ativar_resumo ){ ?>
                <?= $conteudo['Resumo'] ? $conteudo['Resumo'] : global__get_excerpt( $conteudo['Texto'], 0, 100, " [...]" ) ?>
			<?php } ?>
		</div>
	</header>

	<footer>
        <?php if( (int)$conteudo['Data'] > 0 ){ ?>
        <div class="data"><i class="glyphicon glyphicon-calendar"></i>&nbsp;<?=formatacao__data_ptBR($conteudo['Data'])?></div>
        <?php }?>

		<div class="btn-group" >
			<?php if( $ativar_botao_conteudo ){ ?>
			<a class="btn btn-primary btn-conteudo" href="<?=$href?>">
				<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Leia
            </a>
			<?php } ?>

			<?php if( $ativar_botao_video && false ){ ?>
			<a class="mobile btn btn-default btn-video" href="<?=$conteudo['Video']?>">
				<i class="fa fa-play" aria-hidden="true"></i>&nbsp;Assista
			</a>
			<?php } ?>

			<?php if( $ativar_botao_video ){ ?>
			<a class="desktop btn btn-light btn-video" href="<?=$href?>">
				<i class="fa fa-play" aria-hidden="true"></i>&nbsp;Assista
			</a>
			<?php } ?>

			<?php if( $ativar_botao_download ){ ?>
				<?php include ("parts/pagina-download.part.php");?>
			<?php } ?>
		</div>
	</footer>
</article>
<?php } ?>

<?php if( (int)$pagina_total > 1 ){ ?>
<footer>
	<div class="paginador" data-pagina-atual="<?=$pagina_id?>" data-pagina-total="<?=$pagina_total?>" data-pagina-href="<?="/{$secao_slug}"?>" ></div>
</footer>
<?php } ?>
