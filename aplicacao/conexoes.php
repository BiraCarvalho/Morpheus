<?php

$__DB_INSTANCIA = "Remoto";
if( substr_count( $_SERVER['HTTP_HOST'], "localhost") == 1 || substr_count( $_SERVER['HTTP_HOST'], ".vbox"  ) == 1 ){
    $__DB_INSTANCIA = "Local";
}

$__DB_CONEXAO_PARAMETROS = [
    'dbname'   => $__APLICACAO_CONFIG['Conexoes'][$__DB_INSTANCIA]['ADODB']["Banco"],
    'user'     => $__APLICACAO_CONFIG['Conexoes'][$__DB_INSTANCIA]['ADODB']["Usuario"],
    'password' => $__APLICACAO_CONFIG['Conexoes'][$__DB_INSTANCIA]['ADODB']["Senha"],
    'host'     => $__APLICACAO_CONFIG['Conexoes'][$__DB_INSTANCIA]['ADODB']["Servidor"],
    'driver'   => $__APLICACAO_CONFIG['Conexoes'][$__DB_INSTANCIA]['ADODB']["Driver"],
    'charset'  => $__APLICACAO_CONFIG['Conexoes'][$__DB_INSTANCIA]['ADODB']["Charset"]
];

$__DB_CONEXAO_CONFIG = new \Doctrine\DBAL\Configuration();
$__DB = \Doctrine\DBAL\DriverManager::getConnection( $__DB_CONEXAO_PARAMETROS, $__DB_CONEXAO_CONFIG );
