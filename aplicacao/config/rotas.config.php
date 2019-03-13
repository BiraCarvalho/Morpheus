<?php
return [
	"Rotas" => [

        //Site
        "home"       => [ "Diretorio" => "Site", "Privado" => 0, "Uri" => __SITE_PATH . "/pagina.php",       "Titulo" => "Home"                         ],
        "login"      => [ "Diretorio" => "Site", "Privado" => 0, "Uri" => __SITE_PATH . "/pagina.php",       "Titulo" => "Login"                        ],
        "pagina"     => [ "Diretorio" => "Site", "Privado" => 0, "Uri" => __SITE_PATH . "/pagina.php",       "Titulo" => ""                             ],
        "construcao" => [ "Diretorio" => "Site", "Privado" => 0, "Uri" => __SITE_PATH . "/construcao.php",   "Titulo" => "Projeto em Desenvolvimento"   ],
        "manutencao" => [ "Diretorio" => "Site", "Privado" => 0, "Uri" => __SITE_PATH . "/manutencao.php",   "Titulo" => "Site em manutenção"           ],
        "404"        => [ "Diretorio" => "Site", "Privado" => 0, "Uri" => __SITE_PATH . "/404.php",          "Titulo" => "404 - Página não encontrada!" ],

        //Aplicacao
        "download"  => [ "Diretorio" => "Aplicacao", "Privado" => 0, "Uri" => __APLICACAO_PATH . "/download.php",   "Titulo" => "Download" ],
    	"imagem"    => [ "Diretorio" => "Aplicacao", "Privado" => 0, "Uri" => __APLICACAO_PATH . "/imagem.php",     "Titulo" => "Imagem"   ],
        "ajax"      => [ "Diretorio" => "Aplicacao", "Privado" => 0, "Uri" => __APLICACAO_PATH . "/ajax.php",       "Titulo" => "Ajax"     ],

        //Redir
    	"admin"     => [ "Diretorio" => "Admin", "Uri" => "aplicacao/admin/index.php" ],
    	"adm"       => [ "Diretorio" => "Admin", "Uri" => "aplicacao/admin/index.php" ]
    ],
];
