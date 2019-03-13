<?php
if( !autenticacao__get_logon() ){
    return false;
}
?>
<div class="row admin--wrap-header admin--modulo-wrap admin--modulo-wrap-1">
    <div class="col-md-6 text-left">
        <p class="admin--modulo-titulo" ><?=$dados["modulo_titulo"]?></p>
    </div>
    <div class="admin--wrap-controles col-md-6 text-right">
        <div class="btn-group">
        <?php if( $dados["operacao"] == ""){ ?>
            <?=includes__load_componente( "botoes", ["funcao" => "novo", $dados["modulo"]] )?>
        <?php }?>
        </div>
    </div>
</div>
