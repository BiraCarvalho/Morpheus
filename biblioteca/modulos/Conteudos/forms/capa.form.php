<?php
if(!$dados["resultado"]["Id"] || !$dados["resultado"]["MidiasImagens"]){
    return false;
}
?>
<div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          <p>
            <strong>Imagem Destacada</strong>
            <a class="pull-right form-capa--remover" href="#!" data-conteudo-id="<?=$dados['resultado']["Id"]?>" >Remover</a>
          </p>
          <div class="dropdown">
            <button type="button" data-toggle="dropdown" class="btn btn-block btn-default text-left">
              Selecionar
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" >
            <?php
                $midias_set = $dados['resultado']['MidiasImagens'];
                $capa_id    = $dados['resultado']['MidiasCapa'];
                $capa_nome  = NULL;

                $consulta   = "SELECT * FROM Midias WHERE FIND_IN_SET(`Id`, ?) ORDER BY Id";
                $imagens    = global__db()->fetchAll($consulta,[$midias_set]);
            ?>
            <?php if( $imagens ){ ?>
                <?php foreach( $imagens as $imagem ){ ?>
                <?php
                    if( $capa_id == $imagem["Id"] ){
                        $capa_nome = $imagem["Nome"];
                    }
                ?>
                <li>
                    <a href="#!" class="form-capa--adicionar"  data-conteudo-id="<?=$dados['resultado']["Id"]?>" data-capa-id="<?=$imagem["Id"]?>" data-capa-nome="<?=$imagem["Nome"]?>"  >
                        <img src="/imagem?src=<?=__MIDIAS_BASE_URI . "/" . $imagem["Nome"]?>&w=160&h=50" alt="<?=$imagem["Nome"]?>" >
                    </a>
                </li>
                <li role="separator" class="divider"></li>
                <?php } ?>
            <?php } ?>
            </ul>
          </div>
      </div>
      <div class="panel-body capa">
      <?php
        echo includes__load_form([
            "formulario" => __DIR__ . "/capa-template",
            "capa_nome"	 => $capa_nome,
            "capa_id"    => $capa_id
        ]);
      ?>
      </div>
    </div>
</div>
