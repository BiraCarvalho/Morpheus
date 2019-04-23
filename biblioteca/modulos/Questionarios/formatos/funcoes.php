<?php

/**
 * Iformação de todos os questionários ativos
 */
function questionarios__getAll(string $whereSlug = '', int $whereId = 0)
{
    $where = $whereSlug !== '' ? "AND questionarios.Slug='{$whereSlug}'" : '';
    
    $where = $whereId   !== 0  ? "AND questionarios.Id='{$whereId}'"     : '';

    $consulta = "SELECT * 
                FROM Questionarios AS questionarios
                WHERE questionarios.Situacao = '1'
                AND questionarios.Arquivado = '0'
                AND questionarios.Data <= NOW()
                {$where}
            ORDER BY Id ASC";

    return global__db()->fetchAll($consulta);
}

/**
 * Obter informações sobre um questionário usando sua slug como filtro
 */
function questionarios__getBySlug(string $slug)
{
    $resultado = questionarios__getAll($slug);
    return $resultado[0];
}

/**
 * Buscar dados de um indice de relacionamento pelo id
 */
function questionarios__getIndiceById(int $indiceId)
{
    $indiceId = (int)$indiceId;
    $consulta = "SELECT * 
                    FROM QuestionariosIndice AS Indice
                   WHERE Indice.Id = '{$indiceId}'
                ORDER BY Id DESC";

    return global__db()->fetchAssoc($consulta);
}

/**
 * Buscar dados de um indice de relacionamento pelo uuid
 */
function questionarios__getIndiceByUuid(string $indiceUuid)
{
    $indiceUuid = filter_var($indiceUuid, FILTER_SANITIZE_MAGIC_QUOTES);
    $consulta = "SELECT * 
                    FROM QuestionariosIndice AS Indice
                   WHERE Indice.Uuid = '{$indiceUuid}'
                ORDER BY Id DESC";

    return global__db()->fetchAssoc($consulta);
}

function questionarios__getPerguntas(int $questionarioId)
{
    $consulta = "SELECT 
                    Perguntas.Id,
                    Perguntas.Titulo,
                    Perguntas.Texto,
                    Perguntas.Ordem,
                    Perguntas.Agrupamento
               FROM QuestionariosPerguntas AS Perguntas
              WHERE QuestionariosId = '{$questionarioId}'
            ORDER BY Perguntas.Agrupamento, Perguntas.Ordem, Perguntas.Id";

    return global__db()->fetchAll($consulta);
}

function questionarios__getRespostas(int $indiceId)
{
    $indiceId = (int)$indiceId;
    $consulta = "SELECT * 
                    FROM QuestionariosRespostas AS Respostas
                   WHERE Respostas.QuestionariosIndiceId = '{$indiceId}'
                ORDER BY Id ASC";

    $respostas  = global__db()->fetchAll($consulta);
    
    if(!$respostas){
        return false;
    }
    
    $retorno    = [];
    foreach($respostas as $resposta){
        $retorno[$resposta['QuestionariosPerguntasId']] = $resposta['Valor'];        
    }
    return $retorno;
}