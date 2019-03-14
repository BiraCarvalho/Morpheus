<?php

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "UUID",
    "id"      		=> "uuid",
    "name"    		=> "uuid",
    "form-group"	=> true,
    "class"   		=> "text-right",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "readonly",
    "value"   		=> $dados["resultado"]["uuid"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Id",
    "id"      		=> "Id",
    "name"    		=> "Id",
    "form-group"	=> true,
    "class"   		=> "text-right",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> "readonly",
    "value"   		=> $dados["resultado"]["Id"]
]);

echo includes__load_componente("forms", [
    "type"			=> "select",
    "label"			=> "Situação",
    "id"			=> "Situacao",
    "name"			=> "Situacao",
    "form-group"	=> true,
    "class"    		=> "",
    "col-grid" 		=> "col-md-12",
    "multiple" 		=> false,
    "attrs"    		=> "",
    "value"   		=> [$dados["resultado"]["Situacao"]],
    "options"  		=> [
        0 => "Rascunho",
        1 => "Pubicado"
    ]
]);

echo includes__load_componente("forms", [
    "type"			=> "input-text",
    "label"   		=> "Data",
    "id"      		=> "Data",
    "name"    		=> "Data",
    "form-group"	=> true,
    "class"   		=> "data datepicker",
    "col-grid" 		=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Data"]
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Ordem",
    "id"      		=> "Ordem",
    "name"    		=> "Ordem",
    "form-group"	=> true,
    "class"   		=> "",
    "col-grid"  	=> "col-md-12",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["Ordem"]
]);

echo includes__load_componente("forms", [
    "type"    		=> "select",
    "label"   		=> "Privado",
    "id"      		=> "Privado",
    "name"    		=> "Privado",
    "form-group"	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "multiple"		=> false,
    "attrs"   		=> "",
    "value"	  		=> [$dados["resultado"]["Privado"]],
    "options" 		=> [
        0 => "Não",
        1 => "Sim"
    ]
]);

echo includes__load_componente("forms", [
    "type"     		=> "select",
    "label"    		=> "Destaque",
    "id"       		=> "Destaque",
    "name"     		=> "Destaque",
    "form-group"	=> true,
    "class"    		=> "",
    "col-grid" 		=> "col-md-12",
    "multiple" 		=> false,
    "attrs"    		=> "",
    "value"    		=> [$dados["resultado"]["Destaque"]],
    "options"  		=> [
            0 => "Não",
            1 => "Sim"
    ]
]);

echo includes__load_componente("forms", [
    "type"     		=> "select",
    "label"    		=> "Lixeira",
    "id"       		=> "Arquivado",
    "name"     		=> "Arquivado",
    "form-group"	=> true,
    "class"    		=> "",
    "col-grid" 		=> "col-md-12",
    "multiple" 		=> false,
    "attrs"    		=> "",
    "value"    		=> [$dados["resultado"]["Arquivado"]],
    "options"  		=> [
            0 => "Não",
            1 => "Sim"
    ]
]);
