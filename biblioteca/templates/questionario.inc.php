<div class="modulo-wrap modulo-<?=$secao_modulo?> secao-<?=$secao_slug?> secao-raiz-<?=$secao_raiz_slug?>" >

    <?php
        $conteudo_wrap_class_default = "conteudo-wrap";
        $conteudo_wrap_class         = " single";
        $conteudo_wrap_tag_open      = "<div class=\"{$conteudo_wrap_class_default}{$conteudo_wrap_class}\" >";
        $conteudo_wrap_tag_close     = "</div>";
    ?>

    <?=$conteudo_wrap_tag_open?>

    <?php if( $secao_texto_cabecalho ){ ?>
        <div class="secao-cabecalho">
        <?=$secao_texto_cabecalho;?>
        </div>
    <?php } ?>

    <?php if( $secao_texto ){ ?>
        <div class="secao-texto">
        <?=$secao_texto;?>
        </div>
    <?php } ?>

    <?php include_once __MODULOS_PATH . "/" . $secao_modulo . "/formatos/init.inc.php" ?>

    <?php if( $secao_texto_rodape ){ ?>
        <div class="secao-rodape">
        <?=$secao_texto_rodape;?>
        </div>
    <?php } ?>

    <?=$conteudo_wrap_tag_close?>

</div>
