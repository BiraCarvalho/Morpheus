<?php require_once __DIR__ . "/init.php" ?>

<?php include_once "parts/header.part.php" ?>
<?php include_once "parts/menu.part.php" ?>

<main class="container-fluid" >
    <?php if( $__include = admin__get_modulo_path($__modulo, $__modulos) ){ ?>
    <?php include_once $__include ?>
    <?php } else {?>
    <?php echo alert__show(__NAMESPACE);?>
    <?php } ?>
</main>

<?php include_once "parts/footer.part.php"?>
