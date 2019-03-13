<?php                      

$Multiplayer = new Multiplayer\Multiplayer();

$options = array(
	'autoPlay' => false
);

echo $Multiplayer->html( $video_url, $options );