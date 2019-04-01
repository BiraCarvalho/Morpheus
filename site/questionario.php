<?php require_once __DIR__ . "/parts/header.part.php"; ?>

<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="#!">
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

<!-- Begin page content -->
<main role="main" class="flex-shrink-0 pt-3">
    <div class="container">
        <?php include_once __BIBLIOTECA_PATH . "/templates/questionario.inc.php" ?>
    </div>
</main>

<?php require_once __DIR__ . "/parts/footer.part.php"; ?>

