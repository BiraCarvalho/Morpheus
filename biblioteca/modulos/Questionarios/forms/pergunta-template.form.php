<div id="PerguntaCampo_<?=$dados["pergunta_id"]?>">
    <div class="form-group">
        <div class="pull-left margin-right-10px">
            <label class="control-label" for="Pergunta_Id_#">#Id</label>
            <input class="form-control" type="text" id="Pergunta_Id_<?=$dados["pergunta_id"]?>" name="Pergunta_Id[]" value="<?=$dados["pergunta_id"]?>" readonly >
        </div>
        <div class="pull-left margin-right-10px">
            <label class="control-label" for="Pergunta_Ordem_<?=$dados["pergunta_id"]?>">Ordem</label>
            <input class="form-control" type="text" id="Pergunta_Ordem" name="Pergunta_Ordem[]" value="<?=$dados["registro"]["Ordem"]?>">
        </div>
        <div class="pull-left margin-right-10px">
            <label class="control-label" for="Pergunta_Agrupamento_<?=$dados["pergunta_id"]?>">Agrupamento</label>
            <input class="form-control" type="text" id="Pergunta_Agrupamento" name="Pergunta_Agrupamento[]" value="<?=$dados["registro"]["Agrupamento"]?>">
        </div>
        <div class="pull-right">
            <a href="#form-perguntas--footer" data-perguntas-id="<?=$dados["pergunta_id"]?>" class="form-perguntas--remover text-danger">Remover</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="control-label" for="Pergunta_Titulo_<?=$dados["pergunta_id"]?>">Pergunta</label>
        <textarea class="form-control" rows="2" id="Pergunta_Titulo_<?=$dados["pergunta_id"]?>" name="Pergunta_Titulo[]" ><?=$dados["registro"]["Titulo"]?></textarea>
    </div>
    <div class="form-group">
        <label class="control-label" for="Pergunta_Texto_<?=$dados["pergunta_id"]?>">Complemento</label>
        <textarea class="form-control ck-small" rows="5" id="Pergunta_Texto_<?=$dados["pergunta_id"]?>" name="Pergunta_Texto[]"><?=$dados["registro"]["Texto"]?></textarea>
    </div>
    <hr>
</div>
