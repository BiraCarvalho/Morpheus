<div class="well well-lg">
	<div class="row">
	<?php
	echo includes__load_componente("forms", [
		"type"	  		=> "input-text",
		"label"   		=> "Título",
		"id"      		=> "Titulo",
		"name"    		=> "Titulo",
		"form-group" 	=> true,
		"class"   		=> "",
		"col-grid"		=> "col-md-12",
		"attrs"   		=> "",
		"value"   		=> $dados["resultado"]["Titulo"]
	]);

	echo includes__load_componente("forms", [
		"type"	  		=> "input-text",
		"label"   		=> "Slug",
		"id"      		=> "Slug",
		"name"    		=> "Slug",
		"form-group" 	=> true,
		"class"   		=> "",
		"col-grid"		=> "col-md-12",
		"attrs"   		=> [],
		"value"   		=> $dados["resultado"]["Slug"]
	]);
	?>
	</div>
</div>

<?php

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Módulo",
    "id"      		=> "Modulo",
    "name"    		=> "Modulo",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> [],
    "value"   		=> $dados["resultado"]["Modulo"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Formato",
    "id"      		=> "Formato",
    "name"    		=> "Formato",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> [],
    "value"   		=> $dados["resultado"]["Formato"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "URI",
    "id"      		=> "Uri",
    "name"    		=> "Uri",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> [],
    "value"   		=> $dados["resultado"]["Uri"]
]);

echo includes__load_componente("forms", [
	"type"     		=> "select",
	"label"    		=> "Grupos",
	"id"       		=> "Grupos",
	"name"     		=> "Grupos[]",
	"form-group" 	=> true,
	"class"    		=> "",
	"col-grid" 		=> "col-md-12",
	"multiple" 		=> true,
	"attrs"    		=> "",
	"value"    		=> explode(",",$dados["resultado"]["Grupos"]),
	"options"  		=> grupos__select()
]);

echo includes__load_componente("forms", [
	"type"     		=> "select",
	"label"    		=> "Seção Pai",
	"id"       		=> "PaiId",
	"name"     		=> "PaiId",
	"form-group" 	=> true,
	"class"    		=> "",
	"col-grid" 		=> "col-md-12",
	"multiple" 		=> false,
	"attrs"    		=> "",
	"value"    		=> explode(",", $dados["resultado"]["PaiId"]),
	"options"  		=> secoes__select("","AND Id <> '{$dados["resultado"]["Id"]}' AND PaiId <> '{$dados["resultado"]["Id"]}' ")
]);

echo includes__load_componente("forms", [
	"type"     		=> "select",
	"label"    		=> "Seção Filha",
	"id"       		=> "FilhoId",
	"name"     		=> "FilhoId",
	"form-group" 	=> true,
	"class"    		=> "",
	"col-grid" 		=> "col-md-12",
	"multiple" 		=> false,
	"attrs"    		=> "",
	"value"    		=> explode(",", $dados["resultado"]["FilhoId"]),
	"options"  		=> secoes__select("","AND PaiId =  '{$dados["resultado"]["Id"]}'")
]);

echo includes__load_componente("forms", [
	"type"	  		=> "textarea",
    "label"   		=> "Cabeçalho",
    "id"      		=> "Cabecalho",
    "name"    		=> "Cabecalho",
	"form-group" 	=> true,
    "class"   		=> "ck-small",
	"col-grid"		=> "col-md-12",
    "rows"    		=> 5,
    "value"   		=>  $dados["resultado"]["Cabecalho"]
]);

echo includes__load_componente("forms", [
	"type"	  		=> "textarea",
    "label"   		=> "Texto",
    "id"      		=> "Texto",
    "name"    		=> "Texto",
	"form-group" 	=> true,
	"class"   		=> "ck",
	"col-grid"		=> "col-md-12",
    "rows"    		=> 15,
    "value"   		=> $dados["resultado"]["Texto"]
]);

echo includes__load_componente("forms", [
	"type"	  		=> "textarea",
    "label"   		=> "Rodapé",
    "id"      		=> "Rodape",
    "name"    		=> "Rodape",
	"form-group" 	=> true,
    "class"   		=> "ck-small",
	"col-grid"		=> "col-md-12",
    "rows"    		=> 5,
    "value"   		=>  $dados["resultado"]["Rodape"]
]);
