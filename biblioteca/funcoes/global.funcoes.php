<?php

function global__db(){
    global $__DB;
    return $__DB;
}

function  global__filter_request( $variable, $filter = FILTER_DEFAULT ){

	$post = filter_input( INPUT_POST, $variable, $filter );

	if( $post ){
		return $post;
	}

	$get = filter_input( INPUT_GET, $variable, $filter );

	return $get;

}

function global__get_slug(){
    return global__filter_request( "slug" );
}

function global__gera_senha( $tamanho = 8, $minusculas_peso = 1, $numeros = true, $numeros_peso = 3, $maiusculas = false, $maisculas_peso = 2, $simbolos = false, $simbolos_peso = 1 ){

	$caracteres_minusculo = 'abcdefghijklmnopqrstuvwxyz';
	$caracteres_maiusculo = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$caracteres_numericos = '1234567890';
	$caracteres_simbolos  = '!@#$%*-';

	$retorno     = '';
	$caracteres  = '';
	$caracteres .= str_repeat( $caracteres_minusculo, $minusculas_peso );

	if( $maiusculas ){
		$caracteres .= str_repeat( $caracteres_maiusculo, $maisculas_peso);
	}

	if( $numeros ){
		$caracteres .= str_repeat( $caracteres_numericos, $numeros_peso );
	}

	if( $simbolos ){
		$caracteres .= str_repeat( $caracteres_simbolos, $simbolos_peso );
	}

	$caracteres         = str_shuffle ( $caracteres );
	$caracteres_tamanho = strlen( $caracteres );

	$posicao = rand( 1, $caracteres_tamanho - $tamanho );
	$retorno = substr( $caracteres, $posicao, $tamanho );

	return $retorno;

}

function global__redirect( $location, $replace = true, $http_response_code = 301 ){
    header( "Location: {$location}", $replace, $http_response_code );
    die();
}

function global__show_colunms( $tabela, $where = false ){

	if( $where ){
		$where = " WHERE {$where} ";
	}

	$consulta = "SHOW COLUMNS FROM {$tabela}{$where}";
	return global__db()->fetchAll( $consulta );

}

function global__mask( $val, $mask ){

	$val = (string)$val;

	$maskared = '';
	$k        = 0;

	for( $i = 0; $i <= strlen( $mask ) - 1; $i++ ){

	if($mask[$i] == '#'){
		if(isset($val[$k])){
			$maskared .= $val[$k++];
		}
	} else {
		if(isset($mask[$i])){
		 $maskared .= $mask[$i];
		}
	}

	}

	return $maskared;

}


function global__clean_string( $string ) {

	$a = [
		'/(à|á|â|ã|ä|å|æ)/i',
		'/(À|Á|Â|Ã|Ä|Å)/i',
		'/(è|é|ê|ë)/i',
		'/(È|É|Ê|Ë)/i',
		'/(ì|í|î|ï)/i',
		'/(Ì|Í|Î|Ï)/i',
		'/(ð|ò|ó|ô|õ|ö|ø|œ)/i',
		'/(Ò|Ó|Ô|Õ|Ö|Ø)/i',
		'/(ù|ú|û|ü)/i',
		'/(Ù|Ú|Û|Ü)/i',
		'/(ç)/i',
		'/(Ç)/i',
		'/(ñ)/i',
		'/(Ñ)/i',
		'/þ/i',
		'/ñ/i',
		'/ß/i',
		'/(ý|ÿ)/i',
		'/(;)/i',
		'/(=|\+|\/|\\\|\.|\'|\_|\\n| |\(|\))/',
		'/[^a-z0-9_ -]/i',
		'/-{2,}/i'
		];

	$b = [ 'a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'c', 'C', 'n', 'N', 'd', 'n', 'ss', 'y', ',', '-', '', '-' ];

	return preg_replace( $a, $b, $string );
}

function global__clean_url( $string ) {
    $string = global__clean_string( $string );
    $string = strtolower( $string );
    return trim( $string , '-' );
}

//Faz um corte em um texto em um limite de caracteres
function global__get_excerpt( $text, $startPos=0 , $maxLength=100, $endSimbol="..." ) {

	$text = strip_tags($text);

	if( strlen($text) > $maxLength ) {

		$excerpt   = substr($text, $startPos, $maxLength-3);
		$lastSpace = strrpos($excerpt, ' ');
		$excerpt   = substr($excerpt, 0, $lastSpace);
		$excerpt   = trim($excerpt,"\,\;,\:");

		$excerpt  .= " ".$endSimbol;

	} else {

		$excerpt = $text;
	}

	return $excerpt;
}


function global__get_http_response_code($URL){
    $headers = @get_headers($URL);
    return (int)substr($headers[0], 9, 3);
}

function global__recaptcha_validate(){

	$recaptcha['url_verify']       = "https://www.google.com/recaptcha/api/siteverify";
	$recaptcha['param_secret_key'] = "?secret=" . config__get_db("googleRecaptchaPrivateKey");
	$recaptcha['param_response']   = "&response=".$_POST['g-recaptcha-response'];
	$recaptcha['param_remoteip']   = "&remoteip=".$_SERVER['REMOTE_ADDR'];

	$recaptcha_url_complete = implode("",$recaptcha);

	if($_POST['g-recaptcha-response']){

		$response_json  = file_get_contents( $recaptcha_url_complete, true );
		$response_array = json_decode($response_json);

		return $response_array->success;

	}

	return false;

}
