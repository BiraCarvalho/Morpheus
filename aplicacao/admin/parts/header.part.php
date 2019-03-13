<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=__ADMIN_TITLE?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#135568">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href="<?=__NODE_MODULES_PATH?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=__NODE_MODULES_PATH?>/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="<?=__NODE_MODULES_PATH?>/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?=__NODE_MODULES_PATH?>/select2-bootstrap-theme/dist/select2-bootstrap.min.css" rel="stylesheet">
    <link href="<?=__NODE_MODULES_PATH?>/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?=__NODE_MODULES_PATH?>/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
    <link href="<?=__NODE_MODULES_PATH?>/bootstrap-fileinput/themes/explorer/theme.css" rel="stylesheet">
    <link href="<?=__NODE_MODULES_PATH?>/modaal/dist/css/modaal.min.css" rel="stylesheet">

    <link href="assets/css/estilos.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if(__DEBUGBAR){ ?>
    <?php echo $debugbarRenderer->renderHead() ?>
    <?php } ?>

  </head>
  <body>
