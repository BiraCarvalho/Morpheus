  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="/home">
            Triconsult
            <span id="navbar--questionario-titulo" class="font-weight-normal ml-2"></span>
        </a>

        <?php if( autenticacao__get_logon() && $secao_slug != "autenticacao" ){ ?>
        <div class="ml-auto">
        
        <div class="input-group input-group-sm">
            
            <div class="input-group-prepend">
                <span class="input-sm input-group-text ">Bem vindo, <?=$autenticacao__usuario["Nome"]?>!</span>
            </div>
            <div class="input-group-append">
            <a class="btn btn-secondary" href="/autenticacao/logout">Sair</a>
            </div>
            
        </div>     
        
            
            
        </div>      
        <?php }else{ ?>
        <div class="ml-auto">
            <div class="btn-group btn-group-sm" >
                <a href="/login" class="btn btn-sm btn-primary">Login</a>
                <a href="/registrar" class="btn btn-sm btn-secondary">Registrar</a>
            </div>    
        </div>          
        <?php } ?>
  
    </nav>
  </header>