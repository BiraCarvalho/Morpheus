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
                        <div class="clearfix"></div>
                        <div class="well well-sm">
                        	<div class="row">
                        	<?php
                        	echo includes__load_componente("forms", [
                        		"type"	  		=> "input-text",
                        		"label"   		=> "Nome",
                        		"id"      		=> "Nome",
                        		"name"    		=> "Nome",
                        		"form-group" 	=> true,
                        		"class"   		=> "",
                        		"col-grid"		=> "col-md-12",
                        		"attrs"   		=> "",
                        		"value"   		=> $dados["resultado"]["Nome"]
                        	]);
							?>
							</div>
							<div class="row">
							<?php
                        	echo includes__load_componente("forms", [
                        		"type"	  		=> "input-text",
                        		"label"   		=> "E-mail",
                        		"id"      		=> "Email",
                        		"name"    		=> "Email",
                        		"form-group" 	=> true,
                        		"class"   		=> "",
                        		"col-grid"		=> "col-md-8",
                        		"attrs"   		=> [],
                        		"value"   		=> $dados["resultado"]["Email"]
                        	]);

                        	echo includes__load_componente("forms", [
                        		"type"	  		=> "input-text",
                        		"label"   		=> "Telefone",
                        		"id"      		=> "Telefone",
                        		"name"    		=> "Telefone",
                        		"form-group" 	=> true,
                        		"class"   		=> "telefone",
                        		"col-grid"		=> "col-md-4",
                        		"attrs"   		=> [],
                        		"value"   		=> $dados["resultado"]["Telefone"]
                        	]);
                        	?>
							</div>
							<div class="row">
							<?php
							echo includes__load_componente("forms", [
								"type"	  		=> "textarea",
								"label"   		=> "Observações",
								"id"      		=> "Observacoes",
								"name"    		=> "Observacoes",
								"form-group" 	=> true,
								"class"   		=> "",
								"col-grid"		=> "col-md-12",
								"rows"    		=> 15,
								"value"   		=> $dados["resultado"]["Observacoes"]
							]);
							?>
							</div>
                        </div>
                        <div class="clearfix"></div>


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
