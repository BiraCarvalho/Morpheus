<div class="col-md-8 col-md-offset-2">
    <div class="row">
    <?=alert__show(__NAMESPACE)?>
    <form id="form-main-<?=$secao_modulo?>Contatos" method="post" >
        <?php
        echo includes__load_form([
            "formulario"    => __DIR__ . "/contatos",
            "resultado"     => !empty($_POST) ? $_POST : dbal__select_form("Id", 0, $tabela),
            "registro_id"   => 0,
            "modulo"        => $secao_modulo,
            "tabela"        => $tabela,
        ]);
        ?>
        <div class="col-md-12">
            <div class="wrap-captcha pull-right">
              <div class="g-recaptcha" data-sitekey="<?=config__get_db("googleRecaptchaPubliqueKey")?>"></div>
              <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
            </div>
        </div>

        <div class="col-md-12">
            <div class="contatos--wrap-controles">
                <div class="form-group">
                    <button type="submit" class="contatos--submit btn btn-primary">Enviar</button>
                    <button type="reset" class="contatos--reset btn btn-default">Limpar</button>
                </div>
            </div>
        </div>

    </form>
    </div>
</div>

<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

<script src="<?=__ASSETS_PATH?>/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/jquery-validation/additional-methods.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/jquery-validation/localization/messages_pt_BR.js"></script>
<script src="<?=__ASSETS_PATH?>/js/bootstrap-config.js"></script>
<script src="<?=__ASSETS_PATH?>/js/mascaras.js"></script>

<script src="<?=__MODULOS_ASSETS_PATH?>/<?=$secao_modulo?>/formatos/contatos/validacao.js"></script>
