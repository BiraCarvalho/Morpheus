<div class="acesso-titulo"><a href="/cliente" class="mobile"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></div>

<?php if( autenticacao__get_logon() ){ ?>
    <div class="desktop">
        <div class="saudacao">Bem vinda(o), <?=@$dados["usuario"]["Nome"]?>!</div>
        <ul class="list-unstyled">
            <li><a href="/meus-dados"><i class="fa-fw fa fa-user"></i> Meus Dados</a></li>            
            <li><a href="/pedido"><i class="fa-fw fa fa-shopping-cart"></i> Pedido Atual</a></li>
            <li><a href="/autenticacao/logout"><i class="fa-fw fa fa-sign-out"></i> Sair</a></li>
        </ul>
    </div>
    <?php return; ?>
<?php } ?>

<form id="acessoCliente" class="acessoCliente" action="/autenticacao/login" method="post">
  <input type="hidden" id="headerAutenticacaoRedirect" name="redirect" value="<?=$dados["redirect"]?>" >
  <div class="acesso-titulo">acesso cliente</div>
  <div class="form-group acesso-email">
  <label for="" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" autocomplete="off" class="form-control" id="headerAutenticacaoUsuario" name="login" placeholder="">
    </div>
  </div>
  <div class="form-group acesso-senha">
    <label for="" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" autocomplete="off" class="form-control" id="headerAutenticacaoSenha" name="senha" placeholder="">
    </div>
  </div>
  <div class="form-group acesso-ajuda">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="/cadastro">cadastre-se</a><img src="/site/img/cliente-elipse.png">
      <a href="/recuperar">esqueci minha senha</a><img src="/site/img/cliente-elipse.png">
    </div>
  </div>
  <div class="form-group acesso-bt">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn autenticacao--logon">Acessar</button>
    </div>
  </div>
</form>