<form id="form-main-<?=$dados["modulo"]?>" action="<?=admin__set_url($dados["modulo"])?>" method="POST" enctype="multipart/form-data" class="admin--form-main form-main-<?=$dados["modulo"]?>" >

	<input id="<?=__ADMIN_OPERACAO_QUERY_VAR?>" name="<?=__ADMIN_OPERACAO_QUERY_VAR?>" type="hidden" value="salvar" >

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
                echo includes__load_admin_part( "forms/controles",
                [
                    "registro_id"   => $dados["registro_id"],
    		        "operacao"      => $dados["operacao"],
    		        "modulo"   		=> $dados["modulo"]
    		    ]
    		);
    	?>
    	</div>
    	<div class="panel-body">
    		<div class="container">
    			<div class="row">
                    <div class="col-md-3 col-md-push-9">
                    <?php
                        echo includes__load_form([
                            "formulario" => __DIR__ . "/coluna-fixa",
                            "resultado"  => $dados["resultado"],
                        ]);
                    ?>
                    </div>
                    <div class="col-md-9 col-md-pull-3">
                        <?php
                            echo includes__load_form([
                                "formulario" => __DIR__ . "/principal",
                                "resultado"  => $dados["resultado"],
                                "modulo"     => $dados["modulo"],
                            ]);
                        ?>
                    </div>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- panel-body -->
		<div class="panel-footer">
		<?php
			echo includes__load_admin_part( "forms/controles",
			    [
			        "registro_id"   => $dados["registro_id"],
			        "operacao"      => $dados["operacao"],
			        "modulo"        => $dados["modulo"]
			    ]
			);
		?>
		</div>
	</div>
</form>
