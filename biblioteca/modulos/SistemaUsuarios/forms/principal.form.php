<?php

echo includes__load_componente("forms", [
	"type"     		=> "select",
	"label"    		=> "Grupo",
	"id"       		=> "SistemaGruposId",
	"name"     		=> "SistemaGruposId",
	"form-group" 	=> true,
	"class"    		=> "",
	"col-grid" 		=> "col-md-12",
	"multiple" 		=> false,
	"attrs"    		=> "",
	"value"    		=> explode(",",$dados["resultado"]["SistemaGruposId"]),
	"options"  		=> admin__select_grupos()
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Nome",
    "id"      		=> "Nome",
    "name"    		=> "Nome",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Nome"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Login",
    "id"      		=> "Login",
    "name"    		=> "Login",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Login"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "E-Mail",
    "id"      		=> "Email",
    "name"    		=> "Email",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Email"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-password",
    "label"   		=> "Trocar Senha",
    "id"      		=> "SenhaNova",
    "name"    		=> "SenhaNova",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-6",
    "attrs"   		=> "",
    "value"   		=> ""
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-hidden",
    "label"   		=> "",
    "id"      		=> "SenhaExiste",
    "name"    		=> "SenhaExiste",
    "form-group" 	=> false,
    "class"   		=> "",
    "col-grid"		=> "",
    "attrs"   		=> "",
    "value"   		=> empty($dados["resultado"]["Senha"]) ? "false" : "true"
]);
