<?php

function includes__load($arquivo, $dados = [])
{
    if (!is_file($arquivo)) {
        die("Arquivo de inclusão não existe! Verifique se o diretório e o nome informados estão corretos.");
        return false;
    }

    ob_start();
    include $arquivo;
    return ob_get_clean();
}

function includes__load_part($part, $dados = [])
{
    if (!$part) {
        return false;
    }

    $arquivo = $part . ".part.php";

    return includes__load($arquivo, $dados);
}

function includes__load_form($dados = []){

    if ( empty($dados) ) {
        return false;
    }

    $arquivo = $dados["formulario"] . ".form.php";

    return includes__load($arquivo, $dados);
}

function includes__load_admin_part($part, $dados = []){

    if (!$part) {
        return false;
    }

    $arquivo = __ADMIN_PARTS_PATH . "/" . $part . ".part.php";

    return includes__load($arquivo, $dados);
}

function includes__load_componente($componente, $dados = []){

    if (!$componente) {
        return false;
    }

    $arquivo = __COMPONENTES_PATH . "/" . $componente . "/init.php";

    return includes__load($arquivo, $dados);
}

function includes__load_componente_template( $componente, $template, $dados = []){

    if (!$template) {
        return false;
    }

    $arquivo = __COMPONENTES_PATH ."/". $componente . "/templates/" . $template . ".tpl.php";

    return includes__load($arquivo, $dados);
}
