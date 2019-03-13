<?php if( $dados["capa_nome"] ){ ?>
<img src="/imagem?src=<?=__MIDIAS_BASE_URI . "/" . $dados["capa_nome"]?>&w=200&h=200" alt="<?=$dados["capa_nome"]?>" >
<?php } ?>
<input type="hidden" name="MidiasCapa" value="<?=$dados["capa_id"]?>" >
