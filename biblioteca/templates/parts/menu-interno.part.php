<div id="sidebar" class="menu-wrap">
  <nav>
    <h1 class="hidden">Menu Interno</h1>
    <?php if ($secao_raiz_id) { ?>
        <?=secoes__menu_descendentes( $secao_raiz_id, grupos__filtro_sql_in( $grupo_id ), $dados["rota"], $dados["secoes"] )?>
    <?php } ?>
  </nav>
</div>
