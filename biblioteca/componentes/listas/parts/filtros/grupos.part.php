<span class="form-inline">
<?php
echo includes__load_componente("forms",[
	"type"     => "select",
	"id"       => "Grupos",
	"name"     => "Grupos[]",
	"class"    => "input-sm lista--filtro-grupos-select",
	"multiple" => false,
	"attrs"    => 'data-placeholder = "Selecione um grupo" data-modulo = "' . $dados["modulo"] . '"',
	"value"    => [sessions__get("__filtro_grupo_id")],
	"options"  => grupos__select($dados["modulo"])
]);
?>
<a href="?mod=<?=$dados["modulo"]?>&filtro_grupo=false" class="btn btn-sm btn-default" title="Limpar Grupo">
  <span class="glyphicon glyphicon-erase"></span>
</a>
</span>
