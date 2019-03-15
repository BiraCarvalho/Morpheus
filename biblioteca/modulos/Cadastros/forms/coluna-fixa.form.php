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
        0 => "Inativo",
        1 => "Ativo"
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
