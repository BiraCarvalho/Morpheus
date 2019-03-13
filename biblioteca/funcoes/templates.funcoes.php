<?php

function templates__load_site($template__arquivo, $dados = [])
{
    if (!is_file($template__arquivo)) {
        die("Arquivo de inclusão não existe! Verifique se o diretório e o nome informados estão corretos.");
        return false;
    }

    define("__NAMESPACE", "__SITE");
    sessions__init(__NAMESPACE, "__GLOBAL");

    $grupo_id   = 0;

    $secao_slug = $dados["rota"]["secao"] ?: __SITE_ROTA_DEFAULT;
    $slug       = $dados["rota"]["slug"];
    $pagina_id  = $dados["rota"]["pagina_id"];

    $query_string = !empty($query_string) ? $query_string : "";

    $secao  = templates__get_secao($dados, $secao_slug);

    $secao_titulo       = stripslashes($secao["Titulo"]);
    $secao_uri          = $secao["Uri"];
    $secao_diretorio    = $secao["Diretorio"];
    $secao_raiz_privado = $secao["Privado"];

    //Informações obtidas da tabela Seções. Outras rotas passam direto.
    if( isset($secao["Id"]) ){

        $secao_id       = $secao["Id"];
        $secao_privado  = $secao["Privado"];
        $secao_sidebar  = $secao["Sidebar"];
        $secao_modulo   = $secao["Modulo"];
        $secao_formato  = $secao["Formato"];
        $secao_pai_id   = $secao["PaiId"];
        $secao_filho_id = $secao["FilhoId"];

        $secao_texto           = stripslashes($secao["Texto"]);
        $secao_texto_cabecalho = stripslashes($secao["Cabecalho"]);
        $secao_texto_rodape    = stripslashes($secao["Rodape"]);

        $secao_raiz            = templates__get_secao_raiz($dados, $secao_slug);
        $secao_raiz_slug       = $secao_raiz["Slug"];
        $secao_raiz_titulo     = $secao_raiz["Titulo"];
        $secao_raiz_privado    = $secao_raiz["Privado"];
        $secao_raiz_sidebar    = $secao_raiz["Sidebar"];
        $secao_raiz_id         = $secao_raiz["Id"];

        $secao_raiz_filhos_num = secoes__quantos_filhos($secao_raiz_id);

        if( $secao_filho_id ){
            $secao_redir = templates__get_secao_by_id($dados, $secao_filho_id);
            http_response_code(301);
            global__redirect( $secao_redir['Slug']."/".$query_string );
        }

    }

    if( $secao_raiz_privado ){
        if( !autenticacao__get_logon() && $secao_slug != "autenticacao" ){
           $redirect = !$secao_slug ? "" : "?redirect=/{$secao_slug}";
           http_response_code(301);
           global__redirect("/autenticacao{$redirect}");
       }
    }

    $autenticacao__usuario_hash = null;
    $autenticacao__usuario      = null;

   if( autenticacao__get_logon() && $secao_slug != "autenticacao" ){
       $autenticacao__usuario_hash = autenticacao__get_usuario_uuid();
       $autenticacao__usuario      = clientes__get_usuario($autenticacao__usuario_hash);
   }

   $redirect_request = global__filter_request("redirect");
   $redirect_uri     = $redirect_request ?: __SITE_LOGIN_REDIRECT_URI;

    $__body_classes  = [
        "secao--{$secao_slug}",
        isset($secao_raiz_slug) ? "secao-raiz--{$secao_raiz_slug}" : "",
        isset($secao_modulo)    ? "modulo--{$secao_modulo}"        : "",
        isset($secao_formato)   ? "formato--{$secao_formato}"      : ""
    ];

    $templates__query_string = $dados["query_string"];
    $templates__body_classes = "class=\"" . trim(implode( " ", $__body_classes )) . "\"";

    $templates__h1           = isset($secao_raiz_titulo)    ? $secao_raiz_titulo : $secao_titulo;
    $templates__title        = config__get_db("siteTitulo") ?: null;
    $templates__footer       = includes__load(
                                    __BIBLIOTECA_PATH . "/templates/parts/footer.inc.php",
                                    [
                                        "modulo"  => @$secao_modulo  ?: "",
                                        "formato" => @$secao_formato ?: ""
                                    ]
                                );


    $templates__header       = includes__load(
                                  __BIBLIOTECA_PATH . "/templates/parts/header.inc.php",
                                  [
                                      "modulo"  => @$secao_modulo  ?: "",
                                      "formato" => @$secao_formato ?: ""
                                  ]
                              );

    $templates__header_login = includes__load(
                                  __BIBLIOTECA_PATH . "/templates/parts/header-login.inc.php",
                                  [
                                      "modulo"   => @$secao_modulo  ?: "",
                                      "formato"  => @$secao_formato ?: "",
                                      "usuario"  => @$autenticacao__usuario ?: [],
                                      "redirect" => @$redirect_uri
                                  ]
                              );

    ob_start();
    include $template__arquivo;
    return ob_get_clean();
}


function templates__get_secao($dados, $secao_slug){
    return $dados["secoes"][$secao_slug];
}

function templates__get_secao_by_id($dados, $secao_id){

    foreach( $dados["secoes"] as $secao ){
        if( @$secao["Id"] == $secao_id ){
            return $secao;
        }
    }
}


function templates__get_secao_raiz($dados, $secao_slug)
{
    $secao_pai_id = $dados["secoes"][$secao_slug]["PaiId"];

    if($secao_pai_id){
        $secao_pai = templates__get_secao_by_id($dados, $secao_pai_id);
        return templates__get_secao_raiz($dados, $secao_pai["Slug"]);
    }

    return $dados["secoes"][$secao_slug];
}

function templates__secao_search( $dados, $key, $valor)
{
    foreach( $dados["secoes"] as $secao ){
        if( $secao[$key] == $valor ){
            return $secao;
        }
    }
}

function templates__secao_count( $dados, $key, $valor)
{
    $contador = 0;

    foreach( $dados["secoes"] as $secao ){
        if( $secao[$key] == $valor ){
            $contador++;
        }
    }

    return $contador;
}

function templates__head(){

}

function templates__banners($tipo = 0){
    
    if(!$tipo){
        return false;
    }
    
    $consulta  = "SELECT * FROM Banners 
                    WHERE BannersTiposId = '{$tipo}' 
                    AND Situacao = '1' 
                    ORDER BY Id DESC";
                    
    return global__db()->fetchAll($consulta);    
}