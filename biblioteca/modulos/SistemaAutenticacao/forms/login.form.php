<div id="admin--wrap-form-login" class="admin--wrap-form-login"  >

    <?=alert__show("__ADMIN")?>

    <div class="panel panel-default">
      <div class="panel-body">

        <form id="admin--form-login" class="admin--form-login" action="<?=admin__set_url("SistemaAutenticacao","login")?>" method="post" >

          <div class="form-group">
            <label for="login">Login</label>
            <input class="form-control input-sm" type="text" placeholder="Login" name="login" >
          </div>

          <div class="form-group">
            <label for="senha">Senha</label>
            <input class="form-control input-sm" type="password" placeholder="Senha" name="senha" >
          </div>

        <button class="btn btn-sm btn-primary pull-right" type="submit">
        <span class="glyphicon glyphicon-log-in"></span>&nbsp;Entrar
        </button>

        </form>
      </div>
    </div>
</div>
