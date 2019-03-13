<div class="admin--wrap-controles text-right">
    <div class="btn-group">
        <?php if( $dados["operacao"] == "novo" || $dados["operacao"] == "editar" ){ ?>
            <?=includes__load_componente( "botoes" ,["funcao" => "voltar", $dados["modulo"]] )?>
            <?=includes__load_componente( "botoes", ["funcao" => "novo", $dados["modulo"]] )?>
            <?=includes__load_componente( "botoes", ["funcao" => "salvar", $dados["modulo"]] )?>
            <?php //includes__load_componente( "botoes", ["funcao" => "publicar", $dados["modulo"]] )?>
            <?=includes__load_componente( "botoes", ["funcao" => "arquivar", $dados["modulo"],$dados["registro_id"]] )?>
        <?php }?>
    </div>
</div>
