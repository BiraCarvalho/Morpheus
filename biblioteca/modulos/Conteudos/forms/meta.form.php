<?php if(!$dados["resultado"]["Id"]){ ?>
<div class="alert alert-info">
    Volte à aba <strong>Principal</strong>, informe um título e salve o conteúdo primeiro.
</div>
<?php return false; ?>
<?php } ?>

<!-- META FORM - inicio -->
<?php $form_meta_id = "form-meta--{$dados["modulo"]}"; ?>
<div class="clearfix"></div>
<div class="panel panel-default" id="<?=$form_meta_id?>">
     <div class="panel-heading">
         <strong>Informações Adicionais</strong>
         <a href="#!" data-conteudo-id="<?=$dados["registro_id"]?>" data-wrap-class="<?=$form_meta_id?>-wrap" class="form-meta--adicionar text-primary pull-right">Adicionar</a>
     </div>
    <div class="panel-body <?=$form_meta_id?>-wrap">
    <?php $metadados = dbal__select_meta($dados["registro_id"], "MetaCampo", $dados["tabela"]);?>
    <?php if( $metadados ){ ?>
        <?php foreach ( $metadados as $metadado ){ ?>
        <?php
            echo includes__load_form([
                "formulario"	=> __DIR__ . "/meta-template",
                "form_meta_id"	=> $form_meta_id,
                "registro"	 	=> $metadado,
                "meta_id"	 	=> $metadado["Id"],
                "meta_tag"		=> "MetaCampo",
                "fk_id" 	 	=> $dados["registro_id"],
                "tabela"     	=> $dados["tabela"]
            ]);
        ?>
        <?php } ?>
    <?php } ?>
    </div>
    <div class="panel-footer">
        <a href="#!" data-conteudo-id="<?=$dados["registro_id"]?>" data-wrap-class="<?=$form_meta_id?>-wrap" class="form-meta--adicionar text-primary pull-right">Adicionar</a>
        <div class="clearfix"></div>
    </div>
</div>
<!-- META FORM - fim -->
