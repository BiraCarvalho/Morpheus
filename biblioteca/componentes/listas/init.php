<?php

$load = glob( __DIR__ . '/funcoes/*.funcoes.php' );

foreach( $load as $path ){
	require_once $path;
}

$dados["config"]["colunas"] = componentes__listas_colunas_tipos($dados["config"]["colunas"]);

$registros = listas__init($dados["namespace"], $dados["label"], $dados["tabela"], $dados["config"]);

echo includes__load_componente_template("listas", $dados["template"],
	[
		"tabela"    => $dados["tabela"],
		"modulo"    => $dados["modulo"],
		"config"    => $dados["config"],
		"registros" => $registros
	]
);
