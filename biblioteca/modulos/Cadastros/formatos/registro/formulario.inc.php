<article>
	
    <header class="d-none">
        <h2 id="pagina--titulo">Registro</h2>
    </header>

    <form id="form-main-<?=$secao_modulo?>Registro" class="form--registro formato--form-main m-auto" method="post" >
        
        <?=alert__show(__NAMESPACE)?>
        
        <div class="container">
               
            <?php
            echo includes__load_form([
                "formulario"    => __DIR__ . "/registro",
                "resultado"     => !empty($_POST) ? $_POST : dbal__select_form("Id", 0, $tabela),
                "registro_id"   => 0,
                "modulo"        => $secao_modulo,
                "tabela"        => $tabela,
            ]);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-captcha pull-right">
                    <div class="g-recaptcha" data-sitekey="<?=config__get_db("googleRecaptchaPubliqueKey")?>"></div>
                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="cadastros--wrap-controles">
                        <div class="form-group text-right">
                            <button type="submit" class="cadastros--submit btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
        

</article>
<hr class="mb-4" />

<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

<script src="<?=__ASSETS_PATH?>/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/jquery-validation/additional-methods.js"></script>
<script src="<?=__ASSETS_PATH?>/vendor/jquery-validation/localization/messages_pt_BR.js"></script>
<script src="<?=__ASSETS_PATH?>/js/bootstrap-config.js"></script>
<script src="<?=__ASSETS_PATH?>/js/mascaras.js"></script>

<script src="<?=__MODULOS_ASSETS_PATH?>/<?=$secao_modulo?>/formatos/registro/validacao.js"></script>
