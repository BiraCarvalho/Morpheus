<?php

function email__monta_html( $titulo = "", $conteudo = "" ){

    $dominio = config__get_db('dominio');
    $site    = config__get_db('siteTitulo');
    $ip      = $_SERVER['REMOTE_ADDR'];
    $envio   = date('d/m/Y-H:i:s');

    return "<html>
                <header>
                    <title>{$site} - {$titulo}</title>
                </header>
                <body>
                    <div style=\" width:770px;
                        font-family:sans-serif;
                        font-size:12px;
                        \" >
                    <div style=\" border-bottom:2px solid #000000;
                        padding-bottom:5px;
                        margin-bottom:5px;
                        \">{$site}</div>
                    <h1 style=\"font-size:20px\">{$titulo}</h1>
                    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" >
                    {$conteudo}
                    </table>
                    <div style=\"border-top:2px solid #000000;
                                padding-top:5px;
                                margin-top:5px;
                                text-align:right;
                                \" >{$dominio} - {$ip} - {$envio}</p>
                    </div>
                </body>
            </html>";

}

function email__phpmailer( $config )
{


    return true;

}
