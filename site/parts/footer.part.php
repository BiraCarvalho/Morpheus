    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">Triconsult@2019 - Todos os direitos reservados</span>
        </div>
    </footer>

    <script src="/site/assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="/site/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>    
    <script src="/site/assets/node_modules/js-cookie/src/js.cookie.js"></script>
    
    <script src="<?=__NODE_MODULES_PATH?>/bootbox/dist/bootbox.all.min.js"></script>

    <script src="/biblioteca/assets/js/index.js"></script>

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