<?php
	$midas_set = $conteudo['MidiasImagens'];
	$consulta  = "SELECT * FROM Midias
                    WHERE FIND_IN_SET(`Id`,'{$midas_set}')
                    ORDER BY Ordem";
    $midias    = global__db()->fetchAll($consulta);
?>
<section class='galeria'>
<h3 class="hidden">Fotos</h3>
<?php	foreach( $midias as $imagem ){ ?>
	<?php
		$imagem_src       = "/dados/midias/".$imagem["Nome"];
		$imagem_thumb_src = "/imagem?src={$imagem_src}&w={$galeria_thumb_w}&h={$galeria_thumb_h}";
        $imagem_nome      = $imagem["Nome"];
        $imagem_legenda   = $imagem['Legenda'];
	?>
	<figure>
		<a rel="box-imagem" href="<?=$imagem_src?>" target="_blank" title="<?=$imagem_legenda?>" >
			<img class="img-responsive" alt="<?=$imagem_nome?>" src="<?=$imagem_thumb_src?>" />
		</a>
		<?php if( $imagem_legenda ){ ?>
			<figcaption><?=$imagem_legenda?></figcaption>
		<?php } ?>
	</figure>
<?php } ?>
</section>
