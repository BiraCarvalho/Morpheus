<?php

use Intervention\Image\ImageManager;

function imagem__load($resource = [], $destino = null){

    if(!$destino){
        header("Content-type: {$resource["mime-type"]}");
    }

    switch($resource["extensao"]){
        case 'jpg':
            return imagejpeg($resource["resource"], $destino, 80);
            break;

        case 'png':
            return imagepng($resource["resource"], $destino);
            break;

        case 'gif':
            return imagegif($resource["resource"], $destino);
            break;
    }

    return null;
}


function imagem__crop( $source = null, $width_max = 1024, $height_max = 1024 ){

    if( !file_exists($source) ){
        return false;
    }

    $width_max  = (int)$width_max;
    $height_max = (int)$height_max;

    if( !$width_max || !$height_max ){
        return false;
    }

    $arquivo   = getimagesize($source);
    $extensao  = image_type_to_extension($arquivo[2],false);
    $extensao  = $extensao === "jpeg" ? "jpg" : $extensao;
    $mime_type = $arquivo["mime"];

    switch($extensao){
        case "jpg":
            $imagem = @imagecreatefromjpeg($source);
            break;
        case "png":
            $imagem = @imagecreatefrompng($source);
            break;
        case "gif":
            $imagem = @imagecreatefromgif($source);
            break;
        default:
            return false;
            break;
    }

    if( !$imagem ){
        return false;
    }

    $width  = imagesx($imagem);
    $height = imagesy($imagem);
    $escala = min($width_max/$width, $height_max/$height);

    if( $escala >= 1 || ($width <= $width_max && $height <= $height_max) ){
        return [
            "resource"  => $imagem,
            "extensao"  => $extensao,
            "mime-type" => $mime_type
        ];
    }

	$aspect_original = $width / $height;
	$aspect_crop     = $width_max / $height_max;

	if ( $aspect_original >= $aspect_crop ){
		 $width_crop  = $width / ($height / $height_max);
		 $height_crop = $height_max;
	} else {
		 $width_crop  = $width_max;
		 $height_crop = $height / ($width / $width_max);
	}

	$resample = imagecreatetruecolor( $width_max, $height_max );
	$center_h  = 0 - ($width_crop  - $width_max ) / 2;
	$center_v  = 0 - ($height_crop - $height_max) / 2;

	imagecopyresampled(
        $resample,
		$imagem,
		$center_h,
		$center_v,
		0,
		0,
		$width_crop, $height_crop,
		$width, $height
	);

    return [
        "resource"  => $resample,
        "extensao"  => $extensao,
        "mime-type" => $mime_type
    ];

}

function imagens__capa( $registro, $config = [] )
{
    $midias   = $config["tabela_midias"];
    $consulta = "SELECT Nome FROM {$midias} WHERE FIND_IN_SET(`Id`,?) ORDER BY RAND()";

    if( isset($config["colunas"]["capa"]) )
    {
        $capa   = $registro[$config["colunas"]["capa"]];
        $imagem = global__db()->fetchColumn($consulta, [$capa]);
        $source = $config["imagem_path"] . "/" . $imagem;

        if(is_file(__ROOT_PATH . $source))
        {
            return $source;
        }
    }

    if( isset($config["colunas"]["galeria"]) )
    {
        $galeria = $registro[$config["colunas"]["galeria"]];
        $imagem  = global__db()->fetchColumn($consulta, [$galeria]);
        $source  = $config["imagem_path"] . "/" . $imagem;

        if(is_file(__ROOT_PATH . $source))
        {
            return $source;
        }
    }

    if( isset($config["colunas"]["texto"]) )
    {
        $texto = stripslashes( $registro[$config["colunas"]["texto"]] );
        if( preg_match('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'\s>]*)/i', $texto, $imagem) )
        {
            if( file_exists(__ROOT_PATH . urldecode($imagem[1])) )
            {
                return $imagem[1];
            }
        }

    }

    if( isset($config["colunas"]["video_url"]) )
    {
        $video_urls = [
            "youtube.com" => "/[\\?\\&]v=([^\\?\\&]+)/",
            "youtu.be"    => "/\/(.+)/",
            "vimeo.com"   => "/[0-9]+/"
        ];

        $video_url = $registro[$config["colunas"]["video_url"]];
        $source    = null;

        foreach( $video_urls as $url => $pattern)
        {
            if ( substr_count($video_url, $url) )
            {
                if( preg_match($pattern, $video_url, $codigo) )
                {
                    if( $url == "vimeo.com")
                    {
                        $json   = file_get_contents("http://vimeo.com/api/v2/video/{$codigo[0]}.json");
                        $json   = json_decode($json, true);
                        $source = $json[0]["thumbnail_large"];
                    }
                    else
                    {
                        $source = "http://img.youtube.com/vi/{$codigo[1]}/maxresdefault.jpg";
                    }

                    if( global__get_http_response_code($source) === 200 )
                    {
                        return $source;
                    }
                }
            }
        }
    }

    return __DADOS_BASE_URI . "/default.png";
}

function imagem__upload($campo, $slug, $path, $width = 1280, $height = 1280, $method = "resize"){
   
    if(!isset($_FILES)){
        return false;
    }

    $arquivos = $_FILES[$campo];    
    $total    = count($arquivos['size']);

    for($arquivo_idx = 0; $arquivo_idx < $total; $arquivo_idx++){

        if(!is_uploaded_file($arquivos["tmp_name"][$arquivo_idx])){
            return false;
        }

        imagem__delete($slug, $path);

        $info          = pathinfo($arquivos["name"][$arquivo_idx]);
        $nome_original = global__clean_url($info["filename"]) . "." . $info["extension"];
        $nome_novo     = $slug . "-" . uniqid() . "." . $info["extension"];
        $origem        = $arquivos['tmp_name'][$arquivo_idx];
        $destino       = $path . DIRECTORY_SEPARATOR . $nome_novo;

        $manager = new ImageManager(array('driver' => 'gd'));

        $manager->make( $origem )->$method( (int)$width, (int)$height, function( $constraint ){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save( $destino );

        return $dados[$arquivo_idx] = [
            "ImagemNome"     => $nome_novo,
            "ImagemMimeType" => mime_content_type($destino)
        ];  

    }

}

function imagem__delete($slug, $path){
    
    $pattern = $path . DIRECTORY_SEPARATOR . $slug . "-*";
    $imagens = glob($pattern);

    if( !$imagens ){
        return false;
    }

    foreach($imagens AS $imagem){
        if( file_exists( $imagem ) ){
            unlink( $imagem );
        }
    }

    return true;

}