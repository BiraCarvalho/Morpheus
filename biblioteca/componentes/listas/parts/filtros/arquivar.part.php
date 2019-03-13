<?php if( $dados["config"]["opcoes"]["arquivar"] ){ ?>
    <span class="form-inline text-right">
        <?php
            $arquivar_status      = listas__get_arquivar_situacao() == "false" ? "true" : "false";
            $arquivar_botao_texto = listas__get_arquivar_situacao() == "false" ? "Lixeira" : "Lixeira";
            $arquivar_botao_cor   = listas__get_arquivar_situacao() == "false" ? "btn-default" : "btn-warning";
            $arquivar_title       = "Exibe e oculta itens que estão na lixeira.";
        ?>
        <a href="?mod=<?=$dados["modulo"]?>&arquivar=<?=$arquivar_status?>" class="btn btn-sm <?= $arquivar_botao_cor ?>" title="<?=$arquivar_title?>">
            <span class="glyphicon glyphicon-trash"></span>&nbsp;<?=$arquivar_botao_texto?>
        </a>
    </span>
<?php } ?>
