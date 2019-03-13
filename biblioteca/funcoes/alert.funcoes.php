<?php

function alert__set( $codigo = "0", $tipo = "info", $mensagem = "", $namespace = __DEFAULT_NAMESPACE, $flash = true  ){

    if( !$mensagem ){
        return false;
    }

    $variavel   = "{$namespace}__ALERT";

    sessions__set($variavel, [
        "__codigo"   => $codigo,
        "__tipo"     => $tipo,
        "__mensagem" => $mensagem,
        "__flash"    => $flash
    ]);

    return;

}

function alert__get( $namespace = __DEFAULT_NAMESPACE ){

    $variavel   = "{$namespace}__ALERT";

	if(!sessions__get($variavel)){
		return false;
	}

    $retorno = sessions__get($variavel);

	sessions__unset($variavel);

    return $retorno;
}

function alert__show( $namespace = __DEFAULT_NAMESPACE ){

    $componente  = "";
    $informacoes = alert__get( $namespace );

    if( $informacoes['__mensagem'] ){
        
        $class_flash  = !$informacoes['__flash'] ? "" : "alert--flash";
        $button_close = !$informacoes['__flash'] ? "" : "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span></button>";
        
        $componente = "
                    <div class=\"alert--wrap {$class_flash}\">
                        <div class=\"alert alert-{$informacoes['__tipo']}\">
                	        {$button_close}		
                			{$informacoes['__mensagem']}
                		</div>
                    </div>
                	";
    }

	return $componente;

}
