<div id="MetaCampo_<?=$dados["meta_id"]?>">
    <input type="hidden" name="Meta_Tag[]" value="<?=$dados["meta_tag"]?>" >
    <div class="form-group">
    <div class="pull-left margin-right-10px">
        <label class="control-label" for="Meta_Id_#">#Id</label>
        <input class="form-control" type="text" id="Meta_Id_<?=$dados["meta_id"]?>" name="Meta_Id[]" value="<?=$dados["meta_id"]?>" readonly >
    </div>
    <div class="pull-left">
        <label class="control-label" for="Meta_Ordem_<?=$dados["meta_id"]?>">Ordem</label>
        <input class="form-control" type="text" id="Meta_Ordem" name="Meta_Ordem[]" value="<?=$dados["registro"]["Ordem"]?>">
    </div>
    <div class="pull-right">
        <a href="#form-meta--footer" data-meta-id="<?=$dados["meta_id"]?>" class="form-meta--remover text-danger">Remover</a>
    </div>
    <div class="clearfix"></div>
    </div>

    <div class="form-group">
        <label class="control-label" for="Meta_Titulo_<?=$dados["meta_id"]?>">Título</label>
        <textarea class="form-control" rows="2" id="Meta_Titulo_<?=$dados["meta_id"]?>" name="Meta_Titulo[]" ><?=$dados["registro"]["Titulo"]?></textarea>
    </div>
    <div class="form-group">
        <label class="control-label" for="Meta_Valor_<?=$dados["meta_id"]?>">Texto</label>
        <textarea class="form-control ck-small" rows="5" id="Meta_Valor_<?=$dados["meta_id"]?>" name="Meta_Valor[]"><?=$dados["registro"]["Valor"]?></textarea>
    </div>
    <hr>
</div>
