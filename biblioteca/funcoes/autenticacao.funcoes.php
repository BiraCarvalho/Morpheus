<?php

function autenticacao__set_logon( $valor = false )
{
  return sessions__set("__logon", $valor);
}

function autenticacao__get_logon()
{
  return sessions__get("__logon");
}

function autenticacao__unset_logon()
{
  return sessions__unset("__logon");
}


function autenticacao__set_usuario_uuid( $valor = null )
{
  return sessions__set("__usuario", md5($valor));
}

function autenticacao__get_usuario_uuid()
{
  return sessions__get("__usuario");
}

function autenticacao__unset_usuario_uuid()
{
  return sessions__unset("__usuario");
}
