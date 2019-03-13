<?php

function admin__select_grupos(){

    $grupos  = admin__get_grupos();
    $retorno = [];

    foreach( $grupos as $grupo ){
        $retorno[$grupo["Id"]] = $grupo["Titulo"];
    }

    return $retorno;
}

function admin__get_grupos(){

    $consulta = "SELECT *
					FROM SistemaGrupos
				   WHERE Situacao = '1'";

    return global__db()->fetchAll( $consulta );
}

function admin__logout()
{
    autenticacao__unset_logon();
    autenticacao__unset_usuario_uuid();
    unset( $_SESSION['KCFINDER'] );
}

function admin__get_usuario( $hash_uuid )
{
    $hash_uuid = filter_var($hash_uuid);

    $consulta = "SELECT SistemaUsuarios.*,
                        SistemaGruposId AS Grupos
					FROM SistemaUsuarios
					WHERE Situacao = '1'
                      AND Arquivado = '0'
					AND MD5(uuid) = '{$hash_uuid}'";

    return global__db()->fetchAssoc( $consulta );
}

function admin__get_modulo_path($modulo,$modulos)
{
    $modulos_init_file =  "init.php";

    if( !isset($modulos[$modulo]) && $modulo != "SistemaAutenticacao" && $modulo != "Dashboard" ){
        alert__set(0, "danger", "Permissão de acesso negada.", __NAMESPACE);
        return false;
    }

    if( !autenticacao__get_logon() ){
        return __MODULOS_PATH . "/" . __ADMIN_MODULO_LOGIN_DEFAULT ."/" . $modulos_init_file;
    }

    $include =  __MODULOS_PATH . "/" . $modulo ."/" . $modulos_init_file;

    if( !is_file( $include) ){
        alert__set(0, "warning", "Arquivo init do módulo não encontrado.", __NAMESPACE);
        return false;
    }

    return $include;
}


function admin__set_url($modulo, $operacao = false, $registro_id = 0 )
{
    $query = "";

    if(!$modulo){
        return false;
    }

    if($modulo){
        $query .= __ADMIN_MODULO_QUERY_VAR . "=" . $modulo;
    };

    if($operacao){
        $query .= "&" . __ADMIN_OPERACAO_QUERY_VAR . "=" . $operacao;
    }

    if($registro_id){
        $query .= "&" . __ADMIN_REGISTRO_QUERY_VAR . "=" . $registro_id;
    }

    return "?" . $query ;
}

function admin__get_modulos( $grupo_id )
{

    $where_grupo  = "";

    if( $grupo_id != 0 && is_numeric($grupo_id) ){
        $grupo_id     = (int)$grupo_id;
        $where_grupo  = "AND FIND_IN_SET( {$grupo_id}, Grupos )";
    }

    $consulta = "SELECT *,
					( SELECT count( Id ) FROM SistemaMenu AS Filhos WHERE Filhos.PaiId = Menu.Id ) as filhosCount
					FROM SistemaMenu AS Menu
					WHERE Menu.Situacao = '1'
					{$where_grupo}
					ORDER BY Ordem, Id, Titulo";

    $modulos  = global__db()->fetchAll( $consulta );
    $retorno  = [];

    if(!$modulos){
        return false;
    }

    foreach ($modulos as $modulo) {
        $retorno[$modulo["Slug"]] = $modulo;
    }

    return $retorno;
}

function admin__get_modulo_ajax($modulo)
{
    $path = __MODULOS_PATH . "/[%modulo%]/ajax.php";

    if( !autenticacao__get_logon() ){
        return false;
    }

    return str_replace( "[%modulo%]" ,$modulo, $path );
}

function admin__menu( $modulos, $menu_id = 0, $grupo_id = 0, $nivel_idx = 0 )
{
    $retorno  = "";

    $nivel_idx++;

    if ( $modulos ) {

        foreach ( $modulos as $modulo ) {
            if( $modulo["PaiId"] == $menu_id ){
                $modulos_filho[$modulo["Id"]] = $modulo;
            }
        }

        foreach ( $modulos_filho as $modulo ) {

            $restrito_class = "";
            $caret          = "";
            $list_class     = "";
            $link_class     = "";
            $link_attr      = "";

            $retorno .= "<li class=\"nivel-{$nivel_idx}\" >";

            if ( $modulo['filhosCount'] ) {

                $caret      = "<span class=\"caret\"></span>";
                $list_class = "class=\"dropdown\"";
                $link_class = "dropdown-toggle";
                $link_attr  = "data-toggle=\"dropdown\" role=\"button\"";

                $retorno .= "<a title=\"{$modulo['Titulo']}\" href=\"?mod={$modulo['Slug']}\" class=\"{$restrito_class} {$link_class}\" {$link_attr} >{$modulo['Titulo']}{$caret}</a>";
                $retorno .= "<ul class=\"dropdown-menu\" >";
                $retorno .= admin__menu($modulos, $modulo['Id'], $grupo_id, $nivel_idx);
                $retorno .= "</ul>";

            } else {

                $retorno .= "<a title=\"{$modulo['Titulo']}\" href=\"?mod={$modulo['Slug']}\" class=\"{$link_class}\" {$link_attr} >{$modulo['Titulo']}{$caret}</a>";

            }

            $retorno .= '</li>';
        }
    }

    return $retorno;
}
