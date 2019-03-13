<nav class="admin--wrap-menu  navbar navbar-default">
  <div class="container-fluid">

    <?php if( autenticacao__get_logon() ){ ?>

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=admin__set_url("Dashboard")?>">
        <img src="assets/images/logo.png" height="20" alt="">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <?=admin__menu($__modulos, 0, $__grupo_id)?>
      </ul>

      <div class="nav navbar-nav navbar-right">
        <p class="navbar-text ">Usuário : <?=$__usuario["Nome"]?></p>
        <a href="<?=admin__set_url("SistemaAutenticacao","logout")?>" class="btn btn-default btn-sm navbar-btn">
            Sair&nbsp;<span class="glyphicon glyphicon-log-out"></span>
        </a>
      </div>

    </div><!-- /.navbar-collapse -->

    <?php } else { ?>

      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <img src="assets/images/logo.png" height="20" alt="">
        </a>
      </div>

    <?php } ?>

  </div><!-- /.container-fluid -->
</nav>
