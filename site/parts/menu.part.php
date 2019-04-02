  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="/home">
            Triconsult
            <span id="navbar--questionario-titulo" class="font-weight-normal ml-2"></span>
        </a>

        <?php if( autenticacao__get_logon() && $secao_slug != "autenticacao" ){ ?>
        <div class="ml-auto">
            <span class="saudacao d-inline-block">Bem vindo, <?=$autenticacao__usuario["Nome"]?>!</span>
            <a class="btn btn-sm btn-light text-danger d-inline-block" href="/autenticacao/logout">Sair</a>
        </div>      
        <?php } ?>
  
    </nav>
  </header>