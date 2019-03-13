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

                        echo includes__load_form([
                            "formulario" => __DIR__ . "/capa",
                            "resultado"  => $dados["resultado"],
                        ]);
                    ?>
                    </div>
                    <div class="col-md-9 col-md-pull-3">
                        <div class="clearfix"></div>
                        <div class="well well-sm">
                        	<div class="row">
                        	<?php
                        	echo includes__load_componente("forms", [
                        		"type"	  		=> "input-text",
                        		"label"   		=> "Título",
                        		"id"      		=> "Titulo",
                        		"name"    		=> "Titulo",
                        		"form-group" 	=> true,
                        		"class"   		=> "",
                        		"col-grid"		=> "col-md-12",
                        		"attrs"   		=> "",
                        		"value"   		=> $dados["resultado"]["Titulo"]
                        	]);

                        	echo includes__load_componente("forms", [
                        		"type"	  		=> "input-text",
                        		"label"   		=> "Slug",
                        		"id"      		=> "Slug",
                        		"name"    		=> "Slug",
                        		"form-group" 	=> true,
                        		"class"   		=> "",
                        		"col-grid"		=> "col-md-12",
                        		"attrs"   		=> [],
                        		"value"   		=> $dados["resultado"]["Slug"]
                        	]);
                        	?>
                        	</div>
                        </div>
                        <div class="clearfix"></div>
                        <hr  />
                        <ul class="nav nav-tabs" data-operacao="<?=$dados["operacao"]?>" >
                            <li class="active">
                                <a href="#principal" data-toggle="tab">Principal</a>
                            </li>
                            <li>
                                <a href="#imagens" data-toggle="tab">Imagens</a>
                            </li>
                            <li>
                                <a href="#metadados" data-toggle="tab">Informações Adicionais</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="principal">
                            <?php
                                echo includes__load_form([
                                    "formulario" => __DIR__ . "/principal",
                                    "resultado"  => $dados["resultado"],
                                    "modulo"     => $dados["modulo"],
                                ]);
                            ?>
                            </div>
                            <div class="tab-pane" id="imagens">
                            <?php
                                echo includes__load_form([
                                    "formulario" => __DIR__ . "/imagens",
                                    "resultado"  => $dados["resultado"],
                                    "modulo"     => $dados["modulo"],
                                ]);
                            ?>
                            </div>
                            <div class="tab-pane" id="metadados">
                            <?php
                                echo includes__load_form([
                                    "formulario"  => __DIR__ . "/meta",
                                    "resultado"   => $dados["resultado"],
                                    "modulo"      => $dados["modulo"],
                                    "registro_id" => $dados["registro_id"],
                                    "tabela"      => $dados["tabela"]
                                ]);
                            ?>
                            </div>

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
