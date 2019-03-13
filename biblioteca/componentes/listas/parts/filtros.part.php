<div class="row admin--wrap-filtros admin--modulo-wrap admin--modulo-wrap-2">
    <div class="col-md-5">
    <?=listas__load_filtro_busca( $dados["modulo"], $dados["config"]["colunas"] )?>
    </div>
    
    <div class="col-md-6">

    <?php if( !empty($dados["config"]["filtros"]["secoes"]) ){ ?>
    <?php include "filtros/secoes.part.php" ?>
    <?php } ?>

    <?php if( !empty($dados["config"]["filtros"]["grupos"]) ){ ?>
    <?php include "filtros/grupos.part.php" ?>
    <?php } ?>

    </div>
    
    <div class="col-md-1 text-right">
    <?php include "filtros/arquivar.part.php" ?>
    </div>
</div>
