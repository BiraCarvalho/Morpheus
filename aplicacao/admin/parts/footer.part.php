    <footer class="footer">
      <div class="container-fluid">
        <span class="text-muted">Versão <?=__VERSAO?></span>
      </div>
    </footer>

    <script src="<?=__NODE_MODULES_PATH?>/jquery/dist/jquery.min.js"></script>
    <script src="<?=__ASSETS_PATH?>/vendor/bootstrap-custom/js/bootstrap.min.js"></script>

    <script src="<?=__NODE_MODULES_PATH?>/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/select2/dist/js/i18n/pt-BR.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-filestyle/src/bootstrap-filestyle.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-fileinput/js/locales/pt-BR.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-fileinput/themes/explorer/theme.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootstrap-fileinput/themes/gly/theme.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/jquery-validation/dist/additional-methods.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/jquery-validation/dist/localization/messages_pt_BR.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/modaal/dist/js/modaal.min.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/bootbox/dist/bootbox.all.min.js"></script>

    <script src="<?=__ASSETS_PATH?>/js/bootstrap-config.js"></script>
    <script src="<?=__ASSETS_PATH?>/js/mascaras.js"></script>

    <!-- No jQuery -->
    <script src="<?=__NODE_MODULES_PATH?>/js-cookie/src/js.cookie.js"></script>

    <!-- Arquivo de configuração do CK -->
    <script src="<?=__NODE_MODULES_PATH?>/ckeditor/ckeditor.js"></script>
    <script src="<?=__NODE_MODULES_PATH?>/ckeditor/adapters/jquery.js"></script>
    <script>var config_ck = "<?=__CKEDITOR_CONFIG_FILE?>"</script>

    <!-- Admin -->
    <script src="assets/js/index.js"></script>

    <?php
     $footer__assets_modulo_uri    = __MODULOS_ASSETS_PATH . "/" . $__modulo . "/assets/js/modulo.js";
     $footer__assets_validacao_uri = __MODULOS_ASSETS_PATH . "/" . $__modulo . "/assets/js/validacao.js";
    ?>

    <?php if( is_file(__ROOT_PATH . $footer__assets_modulo_uri) ){ ?>
    <script src="<?=$footer__assets_modulo_uri?>"></script>
    <?php } ?>

    <?php if( is_file(__ROOT_PATH . $footer__assets_validacao_uri) ){ ?>
    <script src="<?=$footer__assets_validacao_uri?>"></script>
    <?php } ?>

    <?php if(__DEBUGBAR){ ?>
    <?php echo $debugbarRenderer->render() ?>
    <?php } ?>

  </body>
</html>
