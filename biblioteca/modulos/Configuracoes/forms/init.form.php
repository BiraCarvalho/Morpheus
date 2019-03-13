<form id="form-main-<?=$dados["modulo"]?>" action="<?=admin__set_url($dados["modulo"])?>" method="POST" enctype="multipart/form-data" class="admin--form-main form-main-<?=$dados["modulo"]?>" >

	<input id="<?=__ADMIN_OPERACAO_QUERY_VAR?>" name="<?=__ADMIN_OPERACAO_QUERY_VAR?>" type="hidden" value="salvar" >

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="admin--wrap-controles text-right">
                <div class="btn-group">
                    <?=includes__load_componente( "botoes", ["funcao" => "salvar", $dados["modulo"]] )?>
                </div>
            </div>
    	</div>
    	<div class="panel-body">
            <div id="tabs-<?=$dados["modulo"]?>" class="row">
                <div class="col-md-3 col-md-offset-2">
                    <div class="list-group">
                        <?php if ( $grupos = configuracoes__grupos() ) foreach( $grupos as $grupo ){ ?>
                        <a href="#<?=$grupo["Slug"]?>" class="list-group-item" data-toggle="tab" >
                            <h4 class="list-group-item-heading"><?=$grupo["Titulo"]?></h4>
                            <p class="list-group-item-text"><?=$grupo["Descricao"]?></p>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="tab-content">
                        <?php if ( $grupos = configuracoes__grupos() ) foreach( $grupos as $grupo ){ ?>
                        <div class="tab-pane" id="<?=$grupo["Slug"]?>">
                            <h3><?=$grupo["Titulo"]?></h3>
                            <hr />
                            <?php if ( $registros = configuracoes__registros($grupo["Id"]) ) foreach( $registros as $registro ){ ?>
                                <?php echo configuracoes__campos($registro); ?>
                                <hr />
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</div><!-- panel-body -->
		<div class="panel-footer">
            <div class="admin--wrap-controles text-right">
                <div class="btn-group">
                    <?=includes__load_componente( "botoes", ["funcao" => "salvar", $dados["modulo"]] )?>
                </div>
            </div>
		</div>
	</div>
</form>
