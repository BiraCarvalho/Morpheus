<?php
echo includes__load_componente("forms", [
    "type"	  		=> "input-hidden",
    "id"      		=> "op",
    "name"    		=> "op",
    "class"   		=> "",
    "attrs"   		=> "",
    "value"   		=> "gravar"
]);
?>

<div class="row">
<?php
echo includes__load_componente("forms", [
    "type"	  		=> "input-text",
    "label"   		=> "Nome",
    "id"      		=> "Nome",
    "name"    		=> "Nome",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> [],
    "value"   		=> $dados["resultado"]["Nome"]
]);
?>
</div>

<div class="row">
<?php
echo includes__load_componente("forms", [
    "type"	  		=> "input-email",
    "label"   		=> "Email",
    "id"      		=> "Email",
    "name"    		=> "Email",
    "form-group" 	=> true,
    "class"   		=> "",
    "col-grid"		=> "col-md-12",
    "attrs"   		=> [],
    "value"   		=> $dados["resultado"]["Email"]
]);
?>
</div>
<div class="row">
<?php
echo includes__load_componente("forms", [
    "type"	  		=> "input-password",
    "label"   		=> "Senha",
    "id"      		=> "Senha",
    "name"    		=> "Senha",
    "form-group" 	=> true,
    "class"   		=> "senha",
    "col-grid"		=> "col-md-6",
    "attrs"   		=> [],
    "value"   		=> ''
]);	
echo includes__load_componente("forms", [
    "type"	  		=> "input-password",
    "label"   		=> "Confirmar Senha",
    "id"      		=> "ConfirmarSenha",
    "name"    		=> "ConfirmarSenha",
    "form-group" 	=> true,
    "class"   		=> "senha",
    "col-grid"		=> "col-md-6",
    "attrs"   		=> [],
    "value"   		=> ''
]);	
?>
</div>