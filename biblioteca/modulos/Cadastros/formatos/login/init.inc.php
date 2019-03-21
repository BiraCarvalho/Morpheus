<section class="modulo-login py-5" >
    <div class="container">
        <div class="row justify-content-center">

            <?=alert__show(__NAMESPACE)?>

            <form id="formularioLogin" class="col-md-6" method="post" action="/autenticacao/login">
                <input type="hidden" id="redirect" name="redirect" value="<?=$redirect_uri?>" >
                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control email" id="login" name="login" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" autocomplete="off"  class="form-control" id="senha" name="senha" placeholder="Senha">
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary" >Acessar</button>
                </div>
                
                <hr />

                <!--
                <div class="text-center">
                    <a class="btn btn-default" href="/cadastro">Ainda não é cadastrado?</a>
                    <a class="btn btn-default" href="/recuperar">Esqueceu sua senha?</a>
                </div>
                -->
            </form>

        </div>
    </div>
</section>

