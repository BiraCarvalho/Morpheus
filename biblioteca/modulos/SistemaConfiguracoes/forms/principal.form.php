<?php
echo includes__load_componente("forms", [
    "type"			=> "select",
    "label"			=> "Grupo",
    "id"			=> "Grupo",
    "name"			=> "Grupo",
    "form-group"	=> true,
    "class"    		=> "",
    "col-grid" 		=> "col-md-6",
    "multiple" 		=> false,
    "attrs"    		=> "",
    "value"   		=> [$dados["resultado"]["Grupo"]],
    "options"  		=> sistemaConfiguracoes__grupos()
]);

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
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Slug"]
]);

echo includes__load_componente("forms", [
    "type"			=> "select",
    "label"			=> "Tipo de Coluna",
    "id"			=> "Tipo",
    "name"			=> "Tipo",
    "form-group"	=> true,
    "class"    		=> "",
    "col-grid" 		=> "col-md-6",
    "multiple" 		=> false,
    "attrs"    		=> "",
    "value"   		=> [$dados["resultado"]["Tipo"]],
    "options"  		=> [
        "varchar"  => "Varchar",
        "text"     => "Text",
        "ckeditor" => "CKEditor",
        "integer"  => "Integer",
        "double"   => "Double",
        "date"     => "Date",
        "datetime" => "DateTime",
    ]
]);

echo includes__load_componente("forms", [
	"type"	  		=> "textarea",
    "label"   		=> "Valor",
    "id"      		=> "Valor",
    "name"    		=> "Valor",
	"form-group" 	=> true,
	"class"   		=> "",
	"col-grid"		=> "col-md-12",
    "rows"    		=> 10,
    "value"   		=> $dados["resultado"]["Valor"]
]);

echo includes__load_componente("forms", [
	"type"	  		=> "textarea",
    "label"   		=> "Descricao",
    "id"      		=> "Descricao",
    "name"    		=> "Descricao",
	"form-group" 	=> true,
	"class"   		=> "",
	"col-grid"		=> "col-md-12",
    "rows"    		=> 10,
    "value"   		=> $dados["resultado"]["Descricao"]
]);
