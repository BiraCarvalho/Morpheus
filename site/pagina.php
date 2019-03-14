<!doctype html>

<html class="h-100" lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$templates__h1?> - <?=$templates__title?></title>

    <!-- Bootstrap CSS -->
    <link href="/site/assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="#">Triconsult</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?php include_once __BIBLIOTECA_PATH . "/templates/default.inc.php" ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>

    <script src="/site/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/site/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/site/assets/node_modules/popper.js/dist/umd/popper.min.js"></script>

  </body>
</html>
