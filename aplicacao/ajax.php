<?php
require_once __DIR__ . "/init.php";

define("__NAMESPACE", "__SITE");
sessions__init(__NAMESPACE, "__GLOBAL");

$__grupo_id    = 0;
$__modulos     = admin__get_modulos($__grupo_id);
$__modulo      = global__filter_request(__ADMIN_MODULO_QUERY_VAR)   ?: __ADMIN_MODULO_DEFAULT;
$__operacao    = global__filter_request(__ADMIN_OPERACAO_QUERY_VAR);
$__registro_id = global__filter_request(__ADMIN_REGISTRO_QUERY_VAR, FILTER_SANITIZE_NUMBER_INT);

// if( autenticacao__get_logon() )
// {
//     $__usuario_hash_uid = autenticacao__get_usuario_uuid();
//
//     if( $__usuario_hash_uid )
//     {
//
//     }
// }

include_once __MODULOS_PATH . "/{$__modulo}/ajax.php";
