<?php

function sessions__init($namespace, $label)
{
    $_SESSION["__SESSIONS"]["__CURRENT"]["__NAMESPACE"] = $namespace;
    $_SESSION["__SESSIONS"]["__CURRENT"]["__LABEL"]     = $label;

    if (!isset($_SESSION[$namespace][$label])) {
        $_SESSION[$namespace][$label] = [];
        return true;
    }

    return false;
}

function sessions__get_namespace()
{
  return $_SESSION["__SESSIONS"]["__CURRENT"]["__NAMESPACE"];
}

function sessions__get_label()
{
  return $_SESSION["__SESSIONS"]["__CURRENT"]["__LABEL"];
}

function sessions__set($variavel, $valor)
{
    $namespace = sessions__get_namespace();
    $label     = sessions__get_label();

    if (isset($_SESSION[$namespace][$label]) && $variavel) {
        $_SESSION[$namespace][$label][$variavel] = $valor;
        return true;
    }

    return false;
}

function sessions__get( $variavel)
{
    if (!$variavel) {
      return false;
    }

    $namespace = sessions__get_namespace();
    $label     = sessions__get_label();

    if (isset($_SESSION[$namespace][$label][$variavel])) {
        return $_SESSION[$namespace][$label][$variavel];
    }

    return false;
}

function sessions__unset($variavel)
{

  $namespace = sessions__get_namespace();
  $label     = sessions__get_label();

  if (isset($_SESSION[$namespace][$label][$variavel])) {
      unset($_SESSION[$namespace][$label][$variavel]);
      return true;
  }

  return false;
}

function sessions__isset($variavel)
{
  $namespace = sessions__get_namespace();
  $label     = sessions__get_label();

  return isset($_SESSION[$namespace][$label][$variavel]);
}
