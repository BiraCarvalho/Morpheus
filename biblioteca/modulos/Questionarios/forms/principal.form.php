<?php
// echo includes__load_componente("forms", [
// 	"type"     		=> "select",
// 	"label"    		=> "Seções",
// 	"id"       		=> "Secoes",
// 	"name"     		=> "Secoes[]",
// 	"form-group" 	=> true,
// 	"class"    		=> "",
// 	"col-grid" 		=> "col-md-12",
// 	"multiple" 		=> true,
// 	"attrs"    		=> "",
// 	"value"    		=> explode(",",$dados["resultado"]["Secoes"]),
// 	"options"  		=> secoes__select($dados["modulo"])
// ]);

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

// echo includes__load_componente("forms", [
// 	"type"	  		=> "textarea",
//  "label"   		=> "Resumo",
//  "id"      		=> "Resumo",
//  "name"    		=> "Resumo",
// 	"form-group" 	=> true,
//  "class"   		=> "ck-small",
// 	"col-grid"		=> "col-md-12",
//  "rows"    		=> 5,
//  "value"   		=>  $dados["resultado"]["Resumo"]
// ]);

