<script src="//unpkg.com/sweetalert2@7.1.0/dist/sweetalert2.all.js"></script>

<script src="<?=__ASSETS_PATH?>/vendor/bootstrap-3/js/bootstrap.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/magnific-popup/scripts.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/jquery.bootpag.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/modaal/js/modaal.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/slick/slick.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/jquery.matchHeight.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/wow/dist/wow.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/infinite-scroll.pkgd.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/js-cookie/src/js-cookie.js"></script>

<script src="<?=__ASSETS_PATH?>/js/mascaras.js"></script>

<?php $footer__formatos_js_uri = __MODULOS_ASSETS_PATH ."/". $dados["modulo"] . "/formatos/formatos.js"; ?>

<?php if( is_file(__ROOT_PATH . $footer__formatos_js_uri) ){ ?>
<script src="<?=$footer__formatos_js_uri?>"></script>
<?php } ?>

<script src="<?= __ASSETS_PATH ?>/js/autenticacao.js"></script>
<script src="<?= __ASSETS_PATH ?>/js/index.js"></script>