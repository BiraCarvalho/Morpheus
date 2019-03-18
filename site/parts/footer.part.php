    <script src="/site/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/site/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/site/assets/node_modules/popper.js/dist/umd/popper.min.js"></script>

    <script src="/site/assets/node_modules/js-cookie/src/js.cookie.js"></script>

    <?php
     $footer__assets_modulo_uri    = __MODULOS_ASSETS_PATH . "/" . $secao_modulo . "/assets/js/modulo.js";
     $footer__assets_validacao_uri = __MODULOS_ASSETS_PATH . "/" . $secao_modulo . "/assets/js/validacao.js";
    ?>

    <?php if( is_file(__ROOT_PATH . $footer__assets_modulo_uri) ){ ?>
    <script src="<?=$footer__assets_modulo_uri?>"></script>
    <?php } ?>

    <?php if( is_file(__ROOT_PATH . $footer__assets_validacao_uri) ){ ?>
    <script src="<?=$footer__assets_validacao_uri?>"></script>
    <?php } ?>

  </body>
</html>