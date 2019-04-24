<?php

/**
 * Iformação de todos os questionários ativos
 */
function questionarios__getAll(string $where = '')
{
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
    $slug  = filter_var($slug, FILTER_SANITIZE_MAGIC_QUOTES);
    $where = "AND questionarios.Slug='{$slug}'";
    
    $resultado = questionarios__getAll($where);
    return $resultado[0];
}

/**
 * Obter informações sobre um questionário usando o id como filtro
 */
function questionarios__getById(int $questionarioId)
{
    $questionarioId = (int)$questionarioId;
    $where = "AND questionarios.Id='{$questionarioId}'";
    
    $resultado = questionarios__getAll($where);
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

function questionarios__getRespostasByIndices(int $indiceId)
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

function questionarios__getIndicesByCadastros(int $cadastrosId)
{
    $cadastrosId = (int)$cadastrosId;
    
    $consulta = "SELECT 
                    Indice.Id,
                    Indice.uuid,
                    Indice.Criacao,
                    Questionarios.Titulo,
                    Questionarios.Slug,
                    (SELECT COUNT(*) FROM QuestionariosPerguntas AS Perguntas WHERE Perguntas.QuestionariosId = Indice.QuestionariosId ) AS PerguntasCount,
                    (SELECT COUNT(*) FROM QuestionariosRespostas AS Respostas WHERE Respostas.QuestionariosIndiceId = Indice.Id ) AS RespostasCount
                    FROM QuestionariosIndice AS Indice
                    JOIN Cadastros
                    ON CadastrosId = Cadastros.Id
                    JOIN Questionarios
                    ON QuestionariosId = Questionarios.Id
                    WHERE CadastrosId = '{$cadastrosId}'
                ORDER BY Indice.Id DESC";

    return global__db()->fetchAll($consulta);
}

function questionarios__getConclusoesByIndices(int $indiceId)
{    
    $indiceId = (int)$indiceId;

    $consulta  = "SELECT * 
                    FROM QuestionariosConclusoes 
                   WHERE QuestionariosIndiceId = ?";

    return global__db()->fetchAssoc( $consulta , [ $indiceId ]);

}

function questionarios__getResultadoToGraphic(int $indiceId)
{
    $indiceId = (int)$indiceId;
    
    $consulta = "SELECT  
                    Perguntas.Agrupamento, 
                    SUM(Respostas.Valor) AS Soma, 
                    COUNT(Perguntas.Id) AS NumeroDePerguntas, 
                    SUM(Respostas.Valor)/COUNT(Perguntas.Id) AS Media
                    FROM QuestionariosPerguntas AS Perguntas 
                    JOIN QuestionariosRespostas AS Respostas ON Perguntas.Id = Respostas.QuestionariosPerguntasId
                    WHERE Respostas.QuestionariosIndiceId = ?
                    GROUP BY Perguntas.Agrupamento
                    ORDER BY Perguntas.Agrupamento";

    return global__db()->fetchAll($consulta, [ $indiceId ]);
}