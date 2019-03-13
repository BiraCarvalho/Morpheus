<?php if( $conteudos ) foreach( $conteudos as $conteudo ){	?>

<?php
    $conteudo              = formatacao__mysql_html("Conteudos", $conteudo);
    $href                  = "/".$secao_slug."/".$conteudo["Slug"]."/";
    $ativar_link_conteudo  = $conteudo['Texto'] ||  $conteudo['MidiasImagens'] || $conteudo['Video'];
?>

<article class="well well-sm" >
    <header>
    <?php if( $ativar_link_conteudo ){ ?><a href="<?=$href?>" ><?php } ?>
        <h2><?=$conteudo['Titulo']?></h2>
    <?php if( $ativar_link_conteudo ){ ?></a><?php } ?>
    </header>
</article>

<?php } ?>

<?php if( (int)$pagina_total > 1 ){ ?>
<footer>
	<div class="paginador" data-pagina-atual="<?=$pagina_id?>" data-pagina-total="<?=$pagina_total?>" data-pagina-href="<?="/{$secao_slug}"?>" ></div>
</footer>
<?php } ?>
