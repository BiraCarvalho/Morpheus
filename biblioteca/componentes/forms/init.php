<?php

//Input e outros
$dados["type"]          =   @$dados["type"]        ?:  false;
$dados["label"]         =   @$dados["label"]       ?:  "";
$dados["id"]            =   @$dados["id"]          ?:  false;
$dados["name"]          =   @$dados["name"]        ?:  false;
$dados["attrs"]         =   @$dados["attrs"]       ?:  "";

$dados["value"]         =   (!empty(@$dados["value"]) || (int)@$dados["value"] === 0)  ? @$dados["value"] : "";

//Select
$dados["multiple"]      =   @$dados["multiple"]    ?:  false;
$dados["options"]       =   @$dados["options"]     ?:  false;

//Textarea
$dados["rows"]          =   @$dados["rows"]        ?:  false;

//layout
$dados["class"]             =   @$dados["class"]            ?:  false;
$dados["form-group"]        =   @$dados["form-group"]       ?:  false;
$dados["form-group-class"]  =   @$dados["form-group-class"] ?:  false;
$dados["col-grid"]          =   @$dados["col-grid"]         ?:  false;
$dados["clearfix"]          =   @$dados["clearfix"]         ?:  false;
$dados["help-block"]        =   @$dados["help-block"]       ?:  "";

//Input Group
$dados["input-group"]["content"]  =  @$dados["input-group"]["content"] ?:  false;
$dados["input-group"]["type"]     =  @$dados["input-group"]["type"]    ?:  false;


if( !$dados["id"] || !$dados["name"] ){
    echo "Informe o atributos id e name";
    return false;
}

?>

<?php if( $dados["col-grid"] ){ ?>
<div class="<?=$dados["col-grid"]?>">
<?php } ?>

    <?php if( $dados["form-group"] ){ ?>
    <div class="form-group <?=( $dados["form-group-class"] ?: "" )?> ">
    <?php } ?>

    <?php if( $dados["label"] ){ ?>
    <label class="control-label" for="<?=$dados["name"]?>"><?=$dados["label"]?></label>
    <?php } ?>

    <?php if( $dados["input-group"]["content"] ){ ?>
    <div class="input-group">
    <?php } ?>

        <?php include __DIR__ . "/parts/{$dados["type"]}.part.php"; ?>

        <?php if( $dados["input-group"]["type"] == "addon" ){ ?>
        <span class="input-group-addon"><?=$dados["input-group"]["content"]?></span>
        <?php } ?>

        <?php if( $dados["input-group"]["type"] == "button" ){ ?>
        <span class="input-group-btn">
    		<button class="btn btn-default" type="button">
    			<?=$dados["input-group"]["content"]?>
    		</button>
    	</span>
        <?php } ?>

    <?php if( $dados["input-group"]["content"] ){ ?>
    </div>
    <?php } ?>

    <?php if( $dados["help-block"] ){ ?>
    <span class="help-block"><?=$dados["help-block"]?></span >
    <?php } ?>

    <?php if( $dados["form-group"] ){ ?>
    </div>
    <?php } ?>

<?php if( $dados["col-grid"] ){ ?>
</div>
<?php } ?>


<?php if( $dados["clearfix"] ){ ?>
<div class="clearfix"></div>
<?php } ?>
