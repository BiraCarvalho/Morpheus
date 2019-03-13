<?php

$tabela     = "Leads";

$redirect_url = "/{$secao_slug}";

$titulo     = "Formulário de Contato";
$email_bcc  = "";
$email_para = config__get_db("emailContato");

$alerts = [
    "sucesso" => [
        "Texto"    => "Sua mensagem foi enviada com sucesso!",
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
];
