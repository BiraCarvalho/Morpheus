<?php

$tabela     = "Cadastros";

$redirect_url = "/{$secao_slug}";

$titulo     = "Formulário de Cadastro";

$alerts = [
    "sucesso" => [
        "Texto"    => "Seu cadastro foi realizado com sucesso!",
        "Contexto" => "success"
    ],
    "errocap" => [
        "Texto"    => "Marque o campo 'Eu não sou um robô' e tente novamente!",
        "Contexto" => "danger"
    ],
    "erro" => [
        "Texto"    => "Ocorreu um erro inesperado, tente novamente!",
        "Contexto" => "danger"
    ],
    "email-duplicado" => [
        "Texto"    => "O e-mail informado já está cadastrado.",
        "Contexto" => "warning"
    ],   
];
