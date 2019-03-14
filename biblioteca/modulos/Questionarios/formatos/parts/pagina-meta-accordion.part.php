<?php
$consulta = "SELECT * FROM QuestionariosMeta
            WHERE QuestionariosId='{$conteudo_id}}'
            ORDER BY Ordem, Id";

$metadados = global__db()->fetchAll($consulta);
?>
<?php if( $metadados ){ ?>
<div class="meta_conteudos_accordion panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach( $metadados as $meta_conteudo ){ ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="meta-conteudos">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#meta-conteudos-<?=$meta_conteudo['Id'];?>">
          <?=$meta_conteudo['Titulo'];?>
        </a>
      </h4>
    </div>
    <div id="meta-conteudos-<?=$meta_conteudo['Id'];?>" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
       <?=$meta_conteudo['Valor'];?>
      </div>
    </div>
  </div>
  <?php }?>
</div>
<?php }?>
