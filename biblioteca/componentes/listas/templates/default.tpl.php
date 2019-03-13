<div class="admin--lista panel panel-default">
    <div class="panel-heading">
      <?=listas__load_filtros($dados["modulo"], $dados["config"]);?>
    </div>
    <table class="table" >
        <thead>
          <tr>

            <?php if( $dados["config"]["opcoes"]["checkbox"]){ ?>
            <th class="lista--checkbox--all text-center">
              <input name="registros" type="checkbox" value="" >
            </th>
            <?php } ?>

            <?php foreach ( $dados["config"]["colunas"] as $coluna ){ ?>
            <th class="<?="lista--coluna-{$coluna[2]}"?> <?=( isset($coluna[4]) ? $coluna[4] : "" )?>" >
                <span class="lista--coluna-titulo"><?=$coluna[2]?></span>
                <?=listas__load_order_controles($dados["modulo"], $coluna[2])?>
            </th>
            <?php } ?>

            <?php if( $dados["config"]["opcoes"]["controles"]){ ?>
            <th class="lista--controles">&nbsp;</th>
            <?php } ?>

          </tr>
        </thead>
        <tbody>
        <?php $rotulo_id =  @$dados["config"]["default"]["rotulo_id"] ?: "ID"; ?>
        <?php foreach ($dados["registros"] as $registro){ ?>
            <tr>

            <?php if( $dados["config"]["opcoes"]["checkbox"]){ ?>
                <td class="text-center">
                    <input type="checkbox" name="registro[]" value="1" >
                </td>
            <?php } ?>

            <?php
            $coluna_link = false;
            if($dados["config"]["opcoes"]["coluna_link"] && listas__get_arquivar_situacao() == "false"){
                $coluna_link = $dados["config"]["opcoes"]["coluna_link"];
            }
            ?>
            <?php foreach ($dados["config"]["colunas"] as $coluna) { ?>
                <?php $valor     = listas__formata_valores_para_exibicao($dados["config"]["colunas"], $coluna[2], $registro[$coluna[2]]); ?>
                <td class="<?="lista--coluna-{$coluna[2]}"?> <?=( isset($coluna[4]) ? $coluna[4] : "" )?>" >
                    <?=( $coluna_link === $coluna[0] ? '<a href="' . admin__set_url($dados["modulo"], "editar", $registro[$rotulo_id]) . '">': "")?>
                    <?=$valor?>
                    <?=( $coluna_link === $coluna[0] ? '</a>': "")?>
                    <?=( !empty($coluna[3][$valor]) ? "<span class=\"text-muted\">(".$coluna[3][$valor].")</span>" : "" )?>
                </td>
            <?php } ?>

            <?php if( @$dados["config"]["opcoes"]["controles"] ){ ?>
            <td class="lista--controles text-right">

                <?php if( listas__get_arquivar_situacao() == "false" ){ ?>

                    <!-- Exibição do modo normal -->
                    <?=includes__load_componente( "botoes", ["funcao" => "editar-mini", $dados["modulo"], $registro[$rotulo_id] ] )?>

                    <?php if( $dados["config"]["opcoes"]["clonar"] ){ ?>
                    <?=includes__load_componente( "botoes", ["funcao" => "clonar-mini", $dados["modulo"], $registro[$rotulo_id] ] )?>
                    <?php } ?>

                    <?php if( $dados["config"]["opcoes"]["arquivar"] ){ ?>
                        <?=includes__load_componente( "botoes", ["funcao" => "arquivar-mini", $dados["modulo"], $registro[$rotulo_id] ] )?>
                    <?php } ?>
                    
                    <?php if( @$dados["config"]["opcoes"]["excluir"] ){ ?>
                        <?=includes__load_componente( "botoes", ["funcao" => "excluir-mini", $dados["modulo"], $registro[$rotulo_id]] ) ?>
                    <?php } ?>

                    <?php if( @$dados["config"]["opcoes"]["comprovante"] ){ ?>
                        <?=includes__load_componente( "botoes", ["funcao" => "comprovante-mini", $dados["modulo"], $registro[$rotulo_id]] ) ?>
                    <?php } ?>

                <?php } else { ?>

                    <!-- Exibição no modo lixeira -->
                    <?=includes__load_componente( "botoes", ["funcao" => "restaurar-mini", $dados["modulo"], $registro[$rotulo_id]] )?>
                    <?=includes__load_componente( "botoes", ["funcao" => "excluir-mini", $dados["modulo"], $registro[$rotulo_id]] ) ?>

                <?php } ?>
            </td>
            <?php } ?>

          </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer">
        <div class="row admin--wrap-lista-footer">
            <?=listas__load_offset($dados["modulo"])?>
            <div class="col-md-6 text-right">
              <nav>
                <?=listas__load_pager($dados["modulo"])?>
              </nav>
            </div>
        </div>
    </div>
</div>
