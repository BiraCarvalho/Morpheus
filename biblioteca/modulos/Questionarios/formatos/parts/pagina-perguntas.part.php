<?php if( $perguntas = questionarios__perguntas($conteudo_id) ){ ?>

    <?php foreach( $perguntas as $pergunta ){ ?>

    <div id="pergunta_<?=$pergunta['Id'];?>" class="questionarios--pergunta card border-dark mb-3" >
        <div class="card-body text-dark">
            <h5 class="card-title"><?=$pergunta['Ordem'];?>. <?=$pergunta['Titulo'];?></h5>
            <div class="card-text text-muted"><?=$pergunta['Texto'];?></div>
        </div>
        <div class="card-footer d-flex flex-wrap justify-content-center">
            <?php for( $resposta_id = 1; $resposta_id <= (int)$conteudo['Escala']; $resposta_id++ ){ ?>
                <?php $resposta_active = (int)$pergunta['Valor'] === (int)$resposta_id ? "active" : ""; ?>
                <button id="resposta_<?=$resposta_id;?>" type="button" class="questionarios--resposta flex-fill m-1 btn btn-lg btn-outline-secondary <?=$resposta_active?>" 
                autocomplete     = "off"
                data-cadastro-id = "1"
                data-pergunta-id = "<?=$pergunta['Id'];?>"
                value="<?=$resposta_id;?>"
                >
                <?=$resposta_id;?>
                </button>
            <?php } ?>
        </div>
    </div>

    <?php }?>

<?php }?>
