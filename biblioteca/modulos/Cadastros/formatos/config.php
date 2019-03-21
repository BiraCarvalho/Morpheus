<?php

$cliente_uri      = "/perfil";
$autenticacao_uri = "/login";

$redirect_uri     = __SITE_LOGIN_REDIRECT_URI;

$alerts = [
    "informe" => [
        "Texto"    => "Informe usuário e senha!",
        "Contexto" => "warning"
    ],
    "ok" => [
        "Texto"    => "Login realizado com sucesso!",
        "Contexto" => "success"
    ],
    "erro" => [
        "Texto"    => "O email e senha informados não conferem!",
        "Contexto" => "danger"
    ],
    "logout"  => [
        "Texto"    => "Obrigado, e até logo! =)",
        "Contexto" => "info"
    ]
];

