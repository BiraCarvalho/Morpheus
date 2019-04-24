<?php

// function questionarios__resultado(int $questionario_id){

//     $consulta = "SELECT  
//                     Perguntas.Agrupamento, 
//                     SUM(Respostas.Valor) AS Soma, 
//                     COUNT(Perguntas.Id) AS NumeroDePerguntas, 
//                     SUM(Respostas.Valor)/COUNT(Perguntas.Id) AS Media
//                     FROM QuestionariosPerguntas AS Perguntas 
//                     JOIN QuestionariosRespostas AS Respostas ON Perguntas.Id = Respostas.QuestionariosPerguntasId
//                     WHERE Perguntas.QuestionariosId = '{$questionario_id}'
//                     GROUP BY Perguntas.Agrupamento
//                     ORDER BY Perguntas.Agrupamento";

//     return global__db()->fetchAll($consulta);
// }


