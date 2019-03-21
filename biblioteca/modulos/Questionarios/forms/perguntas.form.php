<?php if(!$dados["resultado"]["Id"]){ ?>
<div class="alert alert-info">
    Volte à aba <strong>Principal</strong>, informe um título e salve o conteúdo primeiro.
</div>
<?php return false; ?>
<?php } ?>

<!-- META FORM - inicio -->
<?php $form_pergunta_id = "form-perguntas--{$dados["modulo"]}"; ?>
<div class="clearfix"></div>
<div class="panel panel-default" id="<?=$form_pergunta_id?>">
     <div class="panel-heading">
         <strong>Informações Adicionais</strong>
         <a href="#!" data-conteudo-id="<?=$dados["registro_id"]?>" data-wrap-class="<?=$form_pergunta_id?>-wrap" class="form-perguntas--adicionar text-primary pull-right">Adicionar</a>
     </div>
    <div class="panel-body <?=$form_pergunta_id?>-wrap">
    
    <?php if( $perguntas = questionarios__select_perguntas($dados["registro_id"], $dados["tabela"]) ){ ?>
        <?php 
            foreach ( $perguntas as $pergunta ){
                echo includes__load_form([
                    "formulario"	    => __DIR__ . "/pergunta-template",
                    "form_pergunta_id"	=> $form_pergunta_id,
                    "registro"	 	    => $pergunta,
                    "pergunta_id"	    => $pergunta["Id"],
                    "fk_id" 	 	    => $dados["registro_id"],
                    "tabela"     	    => $dados["tabela"]
                ]);
            }
        ?>
    <?php } ?>
    
    </div>
    <div class="panel-footer">
        <a href="#!" data-conteudo-id="<?=$dados["registro_id"]?>" data-wrap-class="<?=$form_pergunta_id?>-wrap" class="form-perguntas--adicionar text-primary pull-right">Adicionar</a>
        <div class="clearfix"></div>
    </div>
</div>
<!-- META FORM - fim -->
