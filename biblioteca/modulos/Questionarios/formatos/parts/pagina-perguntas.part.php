<?php if( $metadados = questionarios__perguntas($conteudo_id) ){ ?>

    <?php foreach( $metadados as $meta_conteudo ){ ?>

    <div id="pergunta_<?=$meta_conteudo['Id'];?>" class="questionarios--pergunta card border-dark mb-3" data-questionario-id="<?=$meta_conteudo['Id'];?>" >
        <div class="card-body text-dark">
            <h5 class="card-title"><?=$meta_conteudo['Ordem'];?>. <?=$meta_conteudo['Titulo'];?></h5>
            <div class="card-text text-muted"><?=$meta_conteudo['Texto'];?></div>
        </div>
        <div class="card-footer d-flex flex-wrap justify-content-center">
            <?php for( $resposta_id = 1; $resposta_id <= (int)$conteudo['Escala']; $resposta_id++ ){ ?>
                <button id="resposta_<?=$resposta_id;?>" type="button" class="questionarios--resposta flex-fill m-1 btn btn-lg btn-outline-secondary" 
                autocomplete="off"
                data-pergunta-id="<?=$meta_conteudo['Id'];?>"
                value="<?=$resposta_id;?>"
                >
                <?=$resposta_id;?>
                </button>
            <?php } ?>
        </div>
    </div>

    <?php }?>

<?php }?>
