<?php

use Symfony\Component\Debug\Debug;
use DebugBar\StandardDebugBar;

if( __DEBUG ){

    Debug::enable();


    if(__DEBUGBAR){
        $debugbar = new StandardDebugBar();

        //$__DB_CONEXAO_CONFIG->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());

        $debugStack = new Doctrine\DBAL\Logging\DebugStack();
        $__DB_CONEXAO_CONFIG->setSQLLogger($debugStack);
        $debugbar->addCollector(new DebugBar\Bridge\DoctrineCollector($debugStack));

        $debugbarRenderer = $debugbar->getJavascriptRenderer();
        $debugbarRenderer->setBaseUrl(__DEBUGBAR_BASE_URL);

        $storage = new DebugBar\Storage\FileStorage("/dados/logs/debugbar.json");
    }

}
