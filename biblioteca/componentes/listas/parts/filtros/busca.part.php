<form class="form-inline" >
  <input name="mod" type="hidden" value="<?=$dados["modulo"]?>" >
  <input name="termo" type="text" value="<?=$dados["termo"]?>" class="admin--filtros-busca-termo form-control input-sm" placeholder="Termo">
  <select name="coluna" class="admin--filtros-busca-coluna form-control input-sm" data-placeholder="Colunas">
      <option></option>
      <?php foreach( $dados["colunas"] as $coluna ){ ?>
      <option value="<?="{$coluna[1]}.{$coluna[0]}"?>" <?=($coluna[1].".".$coluna[0])==$dados["coluna"]?"selected":""?> ><?=$coluna[2]?></option>
      <?php } ?>
  </select>
  <button type="submit" class="btn btn-sm btn-primary" title="Buscar" >
    <span class="glyphicon glyphicon-search"></span>
  </button>
  <a href="?mod=<?=$dados["modulo"]?>&amp;filtro_busca=false" class="btn btn-sm btn-default" title="Limpar Busca">
    <span class="glyphicon glyphicon-erase"></span>
  </a>
</form>

