<span class="form-inline">
<?php
echo includes__load_componente("forms",[
	"type"     => "select",
	"id"       => "Secoes",
	"name"     => "Secoes[]",
	"class"    => "input-sm lista--filtro-secoes-select",
	"multiple" => false,
	"attrs"    => 'data-placeholder = "Selecione uma seção" data-modulo = "' . $dados["modulo"] . '"',
	"value"   => [sessions__get("__filtro_secao_id")],
	"options"  => secoes__select($dados["modulo"]),
]);
?>
<a href="?mod=<?=$dados["modulo"]?>&filtro_secao=false" class="btn btn-sm btn-default" title="Limpar Seção">
  <span class="glyphicon glyphicon-erase"></span>
</a>
</span>
