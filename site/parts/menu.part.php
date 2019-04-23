  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="/home">
            Triconsult
            <span id="navbar--titulo" class="font-weight-normal ml-2"></span>
        </a>

        <?php if( autenticacao__get_logon() && $secao_slug != "autenticacao" ){ ?>
            <div class="ml-auto d-flex align-items-center" >
                <div class="px-2 navbar--saudacao">Bem vindo, <?=$autenticacao__usuario["Nome"]?>!</div>
                <div class="btn-group btn-group-sm" >
                    <a class="btn btn-light text-danger" href="/autenticacao/logout">Sair</a>
                </div>
            </div>
        <?php }else{ ?>
            <div class="ml-auto d-flex align-items-center" >
                <div class="btn-group btn-group-sm" >
                    <a href="/login" class="btn btn-primary">Login</a>
                    <a href="/registrar" class="btn btn-secondary">Registre-se</a>
                </div>    
            </div>          
        <?php } ?>
  
    </nav>
  </header>