<?php
function conteudos__dados_para_pagina( $secao_id, $grupo_id = 0, $slug = "" )
{
	$conteudo   = "";

	$grupos_where = conteudos__grupos_filtros( $grupo_id );
    $secoes_where = conteudos__secoes_filtros( $secao_id );

	if( !$slug )
    {
		$consulta = "SELECT * FROM Conteudos AS conteudos
                        WHERE conteudos.Situacao = '1'
                        AND conteudos.Data <= NOW()
                        {$secoes_where}
                        {$grupos_where}
                        ORDER BY Id DESC";

	}
    else
    {
		$consulta = "SELECT * FROM Conteudos AS conteudos
                        WHERE conteudos.Situacao = '1'
                        AND conteudos.Data <= NOW()
                        AND conteudos.Slug = '{$slug}'
                        {$secoes_where}
                        {$grupos_where}
                        ORDER BY Id DESC";
	}

	return global__db()->fetchAssoc($consulta);
}

function conteudos__dados_para_lista( $secao_id, $grupo_id = 0, $slug = "", $limit, $offset, $order )
{
    $conteudos   = [];
    $slug_existe = $slug ? " AND conteudos.Slug <> '{$slug}' " : "";

    $grupos_where = conteudos__grupos_filtros( $grupo_id );
    $secoes_where = conteudos__secoes_filtros( $secao_id );

    $consulta   = "SELECT * FROM Conteudos AS conteudos
                    wHERE conteudos.Situacao = '1'
                    AND conteudos.Data <= NOW()
                    {$grupos_where}
                    {$secoes_where}
                    {$slug_existe}
                    ORDER BY {$order}
                    LIMIT {$limit},{$offset}";

    return global__db()->fetchAll($consulta);
}

function conteudos__total_de_linhas_da_lista( $secao_id, $grupo_id = 0, $slug = "" )
{
    $conteudos   = [];
    $slug_existe = $slug ? " AND conteudos.Slug <> '{$slug}' " : "";

    $grupos_where = conteudos__grupos_filtros( $grupo_id );
    $secoes_where = conteudos__secoes_filtros( $secao_id );

    $consulta = "SELECT COUNT(*) FROM Conteudos AS conteudos
                    WHERE conteudos.Situacao = '1'
                    AND conteudos.Data <= NOW()
                    {$grupos_where}
                    {$secoes_where}
                    {$slug_existe}";

    return global__db()->fetchColumn($consulta);
}

function conteudos__secoes_filtros( $secao_id )
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

function conteudos__grupos_filtros( $grupo_id )
{
    $grupos_filtro = "";
    $grupos_where  = "";

    if( $grupo_id ){

    	$grupos_filtro = grupos__filtro_sql_in( $grupo_id );

    	if( $grupos_filtro ){
    		$grupos_filtro = " OR {$grupos_filtro}";
    	}

    	$grupos_where = "AND ( conteudos.Grupos IS NULL OR conteudos.Grupos = ''{$grupos_filtro} )";

    }

    return $grupos_where;
}
