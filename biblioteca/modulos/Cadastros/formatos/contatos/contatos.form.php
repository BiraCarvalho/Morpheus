<?php
echo includes__load_componente("forms", [
    "type"	  		=> "input-hidden",
    "id"      		=> "op",
    "name"    		=> "op",
    "class"   		=> "",
    "attrs"   		=> "",
    "value"   		=> "gravar"
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-hidden",
    "id"      		=> "Tag",
    "name"    		=> "Tag",
    "class"   		=> "",
    "attrs"   		=> "",
    "value"   		=> "Contatos"
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
    "label"   		=> "Email",
    "id"      		=> "Email",
    "name"    		=> "Email",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Email"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Telefone",
    "id"      		=> "Telefone",
    "name"    		=> "Telefone",
    "form-group" 	=> true,
    "class"   		=> "fone",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Telefone"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Assunto",
    "id"      		=> "Assunto",
    "name"    		=> "Assunto",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Assunto"]
]);

echo includes__load_componente("forms", [
	"type"	  		=> "textarea",
    "label"   		=> "Mensagem",
    "id"      		=> "Mensagem",
    "name"    		=> "Mensagem",
	"form-group" 	=> true,
    "class"   		=> "",
	"col-grid"		=> "col-md-12",
    "rows"    		=> 5,
    "value"   		=> $dados["resultado"]["Mensagem"]
]);
