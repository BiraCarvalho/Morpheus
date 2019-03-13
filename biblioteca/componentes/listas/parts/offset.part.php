<div class="col-md-6">
    <span>Exibindo</span>
    <span class="form-inline">
      <select name="offset" class="lista--offset-select form-control input-sm" data-modulo="<?=$dados["modulo"]?>">
        <?php foreach($dados["array"] as $item ){ ?>
        <option value="<?=$item?>" <?=( $dados['offset'] == $item ? "selected" : "" )?> ><?=$item?></option>
        <?php } ?>
      </select>
    </span>
    <span> de <?=$dados["count"]?> registros</span>
</div>
