<?php

function dbal__select_id($tabela,$id)
{
    $consulta  = "SELECT * FROM {$tabela} WHERE Id = ?";
    $resultado = global__db()->fetchAssoc( $consulta , [ (int)$id ]);

    if( $resultado ){
        return $resultado;
    }

	return false;
}

function dbal__select_assoc($tabela, $coluna, $valor)
{    
    $consulta  = "SELECT * FROM {$tabela} WHERE {$coluna} = ?";
    $resultado = global__db()->fetchAssoc( $consulta , [ $valor ]);
    
    if( $resultado ){
        return $resultado;
    }

	return false;
}

function dbal__set_uuid($tabela)
{
    do
    {
        $uuid = formatacao__guid(uniqid("",true));

        $consulta = "SELECT COUNT(*)
                       FROM `{$tabela}`
                      WHERE `uuid` = '{$uuid}'
                   ORDER BY `uuid` DESC";

        $resultado       = global__db()->fetchArray($consulta);
        $resultado_count = $resultado[0];

    } 
    while( $resultado_count >= 1 );

    return $uuid;
}

function dbal__write($request, $tabela, $registro_id, $arrays = [], $tabela_id = "Id")
{    
    $registro   = dbal__prepare_post($request, $tabela, $arrays);        
    $exist_uuid = count(dbal__show_colunms($tabela, "`Field`='uuid'"));
    
    if(!$registro_id)
    {
        if($exist_uuid && empty($registro["uuid"]))
        {
            $registro["uuid"] = dbal__set_uuid($tabela);
        }
         
        global__db()->insert($tabela, $registro);
        return global__db()->lastInsertId();
    }
    else
    {
        global__db()->update($tabela, $registro, [ $tabela_id => $registro_id ] );
        return $registro_id;
    }
}

function dbal__delete($coluna_id, $registro_id, $tabela)
{
    if( $registro_id )
    {
        return global__db()->delete($tabela, [ $coluna_id => $registro_id ]);
    }

	return false;
}

function dbal__select_form($coluna_id, $registro_id, $tabela)
{
    $consulta = "SHOW COLUMNS FROM {$tabela}";
    $colunas  = global__db()->fetchAll( $consulta );

	if( !$registro_id ){
        foreach( $colunas as $coluna ){
            $retorno[$coluna["Field"]] = $coluna["Default"];
        }

        return $retorno;
    }

    $consulta  = "SELECT * FROM {$tabela} WHERE {$coluna_id} = ?";
    $resultado = global__db()->fetchAssoc( $consulta , [ $registro_id ]);

    if( $resultado ){

        foreach ($resultado as $coluna => $valor) {
          $tipo  = dbal__field_type($colunas, $coluna, $valor);
          $valor = formatacao__mysql_exibicao($tipo, $valor);
          $retorno[$coluna] = $valor;
        }

        return $retorno;
    }

	return false;
}

function dbal__field_type($tabela_colunas, $coluna, $valor)
{
    foreach( $tabela_colunas as $tabela_coluna ){
        if( $tabela_coluna["Field"] == $coluna ){
            return $tabela_coluna["Type"];
        }
    }
}

function dbal__prepare_post( $request, $tabela, $campos_array = [] )
{
	$retorno = [];

	$colunas = dbal__show_colunms( $tabela );

	if( !$colunas || !$tabela ){
		return false;
	}

	foreach( $colunas as $coluna ) {
		if( $coluna["Key"] != "PRI" ) {
            $tipo  = $coluna["Type"];
            $campo = $coluna["Field"];
            if( isset($request[$campo]) ){
                $valor = $request[$campo];
                if( in_array( $campo, $campos_array ) ){
                    $valor = dbal__implode_array( $campo, $valor );
                }
                $valor = formatacao__mysql_gravacao( $tipo, $valor );
                $retorno[$coluna["Field"]] = $valor;
            }
        }
    }

	return $retorno;
}

function dbal__show_colunms( $tabela, $where = false )
{
	if( $where ){
		$where = " WHERE {$where} ";
	}

	$consulta = "SHOW COLUMNS FROM {$tabela}{$where}";
	return global__db()->fetchAll( $consulta );
}

function dbal__implode_array( $campo, $valor )
{
    if( !is_array( $valor ) ){
        return $valor;
    }

    //Remove valores duplicados
	$valor = array_unique( $valor );

    //Remove vazios e zeros.
	$valor = array_filter( $valor, function( $v ){
		return !empty( $v ) || $v === '0';
	});

	return implode( ',', $valor );
}


function dbal__get_slug( $registro_id, $tabela ){

    $consulta = "SELECT `Slug`
                   FROM `{$tabela}`
                  WHERE `Id` = ?
               ORDER BY `Slug` DESC";

    return global__db()->fetchColumn($consulta, [$registro_id]);
}

function dbal__set_slug( $tabela, $titulo, $slug = "", $registro_id = 0 )
{
    if( !$titulo ){
        return false;
    }

	$separador = "-";

    $slug  = !$slug ? global__clean_url($titulo) : global__clean_url($slug);

	do{
        $slug  = filter_var( $slug, FILTER_SANITIZE_MAGIC_QUOTES );

        $consulta = "SELECT COUNT(*) AS `count`, `Id`, `Slug`
					   FROM `{$tabela}`
					  WHERE `Slug` = ?
				   ORDER BY `Slug` DESC";

		$resultado = global__db()->fetchAssoc($consulta, [$slug]);
		$count     = $resultado['count'];

        if(  $count == 1 && (int)$registro_id === (int)$resultado["Id"] ){
            return $resultado["Slug"];
        }

		if( $count > 0 ){
			$slug = $slug . $separador . uniqid();
		}

	} while( $count > 0 );

    return $slug;
}

function dbal__select_meta($registro_id, $tag, $tabela)
{
    $consulta  = "SELECT * FROM {$tabela}Meta WHERE {$tabela}Id = ? AND Tag = ?";
    $resultado = global__db()->fetchAll( $consulta , [ $registro_id, $tag ]);

    if( $resultado ){
        return $resultado;
    }

	return false;
}

function dbal__update_meta($request = [], $tabela, $registro_id)
{   
    $prefixo    = "Meta_";
    $meta_id    = "{$prefixo}Id";
    $foreign_id = "{$tabela}Id";
    $tabela     = "{$tabela}Meta";

    if (!isset($request[$meta_id])) {
        return false;
    }

	$count = count($request[$meta_id]);

	foreach( $request as $campo => $valor ){
		if( strpos( $campo, $prefixo ) === 0 ){
			for( $campo_idx = 0; $campo_idx < $count; $campo_idx++  ){
                $coluna = str_replace($prefixo,"",$campo);
				$registros[$campo_idx][$coluna] = $valor[$campo_idx] ;
			}
		}
	}

    foreach ( $registros as $registro ) {
        $registro[$foreign_id] = $registro_id;
        dbal__write($registro, $tabela, $registro["Id"]);
    }

}
