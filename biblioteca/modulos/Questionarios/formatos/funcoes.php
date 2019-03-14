<?php
function questionarios__dados_para_pagina( $secao_id, $grupo_id = 0, $slug = "" )
{
	$conteudo   = "";

	$grupos_where = questionarios__grupos_filtros( $grupo_id );
    $secoes_where = questionarios__secoes_filtros( $secao_id );

	if( !$slug )
    {
		$consulta = "SELECT * FROM Questionarios AS questionarios
                        WHERE questionarios.Situacao = '1'
                        AND questionarios.Data <= NOW()
                        {$secoes_where}
                        {$grupos_where}
                        ORDER BY Id DESC";

	}
    else
    {
		$consulta = "SELECT * FROM Questionarios AS questionarios
                        WHERE questionarios.Situacao = '1'
                        AND questionarios.Data <= NOW()
                        AND questionarios.Slug = '{$slug}'
                        {$secoes_where}
                        {$grupos_where}
                        ORDER BY Id DESC";
	}

	return global__db()->fetchAssoc($consulta);
}

function questionarios__dados_para_lista( $secao_id, $grupo_id = 0, $slug = "", $limit, $offset, $order )
{
    $questionarios   = [];
    $slug_existe = $slug ? " AND questionarios.Slug <> '{$slug}' " : "";

    $grupos_where = questionarios__grupos_filtros( $grupo_id );
    $secoes_where = questionarios__secoes_filtros( $secao_id );

    $consulta   = "SELECT * FROM Questionarios AS questionarios
                    wHERE questionarios.Situacao = '1'
                    AND questionarios.Data <= NOW()
                    {$grupos_where}
                    {$secoes_where}
                    {$slug_existe}
                    ORDER BY {$order}
                    LIMIT {$limit},{$offset}";

    return global__db()->fetchAll($consulta);
}

function questionarios__total_de_linhas_da_lista( $secao_id, $grupo_id = 0, $slug = "" )
{
    $questionarios   = [];
    $slug_existe = $slug ? " AND questionarios.Slug <> '{$slug}' " : "";

    $grupos_where = questionarios__grupos_filtros( $grupo_id );
    $secoes_where = questionarios__secoes_filtros( $secao_id );

    $consulta = "SELECT COUNT(*) FROM Questionarios AS questionarios
                    WHERE questionarios.Situacao = '1'
                    AND questionarios.Data <= NOW()
                    {$grupos_where}
                    {$secoes_where}
                    {$slug_existe}";

    return global__db()->fetchColumn($consulta);
}

function questionarios__secoes_filtros( $secao_id )
{
	$secoes_filtro = "";
	$secoes_where  = "";

	if( $secao_id )
    {
		$secoes_filtro = secoes__filtro_sql_in( $secao_id );
		$secoes_where = "AND ( {$secoes_filtro} )";
	}

	return $secoes_where;
}

function questionarios__grupos_filtros( $grupo_id )
{
    $grupos_filtro = "";
    $grupos_where  = "";

    if( $grupo_id ){

    	$grupos_filtro = grupos__filtro_sql_in( $grupo_id );

    	if( $grupos_filtro ){
    		$grupos_filtro = " OR {$grupos_filtro}";
    	}

    	$grupos_where = "AND ( questionarios.Grupos IS NULL OR questionarios.Grupos = ''{$grupos_filtro} )";

    }

    return $grupos_where;
}
