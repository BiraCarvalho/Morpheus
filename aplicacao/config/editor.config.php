<?php
return [ "Editor" => [

		'KCFINDER' => [
			'uploadURL'           => "/dados/editor/",
			'uploadDIR'           => "/dados/editor/",
			'disabled'            => false,
			'filenameChangeChars' => [ ' ' => "_", '-' => "_", ':' => "_", '?' => "_",'!' => "_",'#' => "_" ],
			'dirnameChangeChars'  => [ ' ' => "_", '-' => "_", ':' => "_",'?' => "_",'!' => "_",'#' => "_"  ],
			'_check4htaccess'     => true,
		]
	]

];
