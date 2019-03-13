<?php if(!$dados["resultado"]["Id"]){ ?>
<div class="alert alert-info">
    Volte à aba <strong>Principal</strong>, informe um título e salve o conteúdo primeiro.
</div>
<?php return false; ?>
<?php } ?>
<?php
echo includes__load_componente("forms", [
    "type"              => "select",
    "label"             => "Exibir Galeria",
    "id"                => "Galeria",
    "name"              => "Galeria",
    "form-group"        => true,
    "form-group-class"	=> "",
    "class"             => "",
    "col-grid"          => "col-md-4 bootstrap--no-gutter",
    "multiple"          => false,
    "attrs"             => "",
    "value"             => [$dados["resultado"]["Galeria"]],
    "options" => [
        0 => "Não",
        1 => "Sim"
    ]
]);
?>
<div class="clearfix"></div>
<?php
echo includes__load_componente("forms", [
    "type"  => "input-file",
    "id"    => "ImagensUpload",
    "name"  => "ImagensUpload[]",
    "class" => "form-main-fileinput",
    "attrs" => "multiple",
]);

echo includes__load_componente("forms", [
    "type"	  		=> "input-hidden",
    "id"      		=> "MidiasImagens",
    "name"    		=> "MidiasImagens",
    "attrs"   		=> "",
    "value"   		=> $dados["resultado"]["MidiasImagens"]
]);
?>

<hr />

<!-- IMAGENS FORM - inicio -->
<div class="panel panel-default imagens" >
    <div class="panel-heading">
        <strong>Galeria</strong>
    </div>
    <div class="panel-body imagens-wrap">
    <?php
        $midias_set = $dados['resultado']['MidiasImagens'];
        $consulta   = "SELECT * FROM Midias WHERE FIND_IN_SET(`Id`, ?) ORDER BY Id";
        $imagens    = global__db()->fetchAll($consulta,[$midias_set]);
    ?>
    <?php if( $imagens ){ ?>
        <?php foreach( $imagens as $imagem ){ ?>
            <?php
                echo includes__load_form([
                    "formulario"	=> __DIR__ . "/imagens-template",
                    "imagem_id"	    => $imagem["Id"],
                    "imagem"	    => $imagem,
                    "conteudo_id"   => $dados["resultado"]["Id"],
                ]);
            ?>
        <?php } ?>
    <?php } ?>
    </div>
</div>
<!-- IMAGENS FORM - fim -->
