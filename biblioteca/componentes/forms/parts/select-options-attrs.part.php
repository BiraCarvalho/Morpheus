<select id="<?=$dados["id"]?>" name="<?=$dados["name"]?>" class="form-control <?=@$dados["class"]?>" <?=(@$dados["multiple"]?"multiple":"")?> <?=(@$dados["attrs"]?:@$dados['attrs'])?> >
    <?php if(!@$dados["multiple"]){ ?>
        <option></option>
    <?php } ?>
    <?php if( @$dados["options"] ){ ?>
		<?php foreach( @$dados["options"] as $value => $infos ){ ?>
        <option value="<?=$value?>" <?=(@$infos["attrs"]?:@$infos['attrs'])?> <?=(@in_array($value,@$dados["value"])?"selected":"")?> ><?=$infos["text"]?></option>
		<?php } ?>
    <?php } ?>
</select>
