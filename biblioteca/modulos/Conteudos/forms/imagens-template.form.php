<div id="Imagem_<?=$dados["imagem_id"]?>" class="thumbnail">
    <a class="box-imagem" rel="box-imagem" href="<?=__MIDIAS_BASE_URI . "/" . $dados["imagem"]["Nome"]?>" target="_blank">
        <img src="/imagem?src=<?=__MIDIAS_BASE_URI . "/" . $dados["imagem"]["Nome"]?>&w=250&h=200" alt="<?=$dados["imagem"]["Nome"]?>" >
    </a>
    <div class="caption"></div>
    <div class="buttons">
      <button data-conteudo-id="<?=$dados["conteudo_id"]?>" data-imagem-id="<?=$dados["imagem_id"]?>" type="button" class="form-imagens--remover btn btn-sm btn-default" title="Remover Imagem">
          <span class="glyphicon glyphicon-remove"></span>
      </button>
    </div>
</div>
