<?php

define ( "__DEFAULT_CHARSET", "UTF-8" );

define ( "__ADMIN_TITLE", "Bira Carvalho - Administração" ); // Titulo da área administrativa
define ( "__VERSAO", "1.0.0 - 03/2019");  // Versão do sistema

define ( "__ROOT_PATH", dirname( __DIR__ )  );
define ( "__BASE_DIR",  ""                  );

define ( "__SITE_PATH",        __ROOT_PATH . "/site"              );
define ( "__APLICACAO_PATH",   __ROOT_PATH . "/aplicacao"         );
define ( "__BIBLIOTECA_PATH",  __ROOT_PATH . "/biblioteca"        );
define ( "__DADOS_PATH",       __ROOT_PATH . "/dados"             );
define ( "__MIDIAS_PATH",      __ROOT_PATH . "/dados/midias"      );

define ( "__MODULOS_PATH",     __BIBLIOTECA_PATH . "/modulos"     );
define ( "__COMPONENTES_PATH", __BIBLIOTECA_PATH . "/componentes" );

define ( "__ADMIN_BASE_PATH" , __APLICACAO_PATH  . "/admin"  );
define ( "__ADMIN_PARTS_PATH", __ADMIN_BASE_PATH . "/parts"  );

define ( "__DEBUG",             TRUE    );
define ( "__DEBUGBAR",          FALSE   );
define ( "__DISPLAY_ERRORS",    TRUE    );

define ( "__DEFAULT_NAMESPACE", "__GLOBAL" );

define ( "__ADMIN_OPERACAO_QUERY_VAR",  "op"     );
define ( "__ADMIN_MODULO_QUERY_VAR",    "mod"    );
define ( "__ADMIN_REGISTRO_QUERY_VAR",  "Id"     );
define ( "__ADMIN_PAGINA_QUERY_VAR",    "pagina" );

define ( "__ADMIN_MODULO_LOGIN_DEFAULT", "SistemaAutenticacao" );
define ( "__ADMIN_MODULO_DEFAULT",       "Dashboard"    );

define ( "__SITE_ROTA_DEFAULT",        "dashboard" );

define ( "__SITE_AUTENTICACAO_URI",   __BASE_DIR . "/autenticacao");
define ( "__SITE_LOGIN_REDIRECT_URI", __BASE_DIR . "/dashboard"  );

define ( "__DADOS_BASE_URI",        __BASE_DIR . "/dados" );
define ( "__MIDIAS_BASE_URI",       __BASE_DIR . "/dados/midias" );
define ( "__ADMIN_BASE_URI",        __BASE_DIR . "/aplicacao/admin" );
define ( "__NODE_MODULES_PATH",     __BASE_DIR . "/biblioteca/node_modules" );
define ( "__MODULOS_ASSETS_PATH",   __BASE_DIR . "/biblioteca/modulos" );
define ( "__ASSETS_PATH",           __BASE_DIR . "/biblioteca/assets" );

define ( "__CKEDITOR_CONFIG_FILE",  __BASE_DIR . "/biblioteca/assets/js/ck.js" );

define ( "__DEBUGBAR_BASE_URL",     __BASE_DIR . "/biblioteca/vendor/composer/maximebf/debugbar/src/DebugBar/Resources/" );