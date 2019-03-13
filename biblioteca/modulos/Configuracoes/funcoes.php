<?php

function configuracoes__registros($grupo_id)
{
    if( !$grupo_id = filter_var($grupo_id, FILTER_SANITIZE_NUMBER_INT) ){
        return null;
    }

    $consulta = "SELECT *
				   FROM Configuracoes
				  WHERE Situacao = '1'
                    AND Arquivado = '0'
                    AND Exibir = '1'
                    AND Grupo = '{$grupo_id}'
		 	   ORDER BY Grupo, Ordem, Slug";

	return global__db()->fetchAll($consulta);
}

function configuracoes__grupos()
{
    $consulta = "SELECT *
				   FROM ConfiguracoesGrupos
				  WHERE Situacao = '1'
		 	   ORDER BY Id, Ordem, Slug";

	return global__db()->fetchAll($consulta);
}

function configuracoes__campos($registro)
{
    //Tipo => [Type,Class]
    $config = [
        "varchar"   => ["input-text"    ,""             ],
        "integer"   => ["input-text"    ,"numero"       ],
        "double"    => ["input-text"    ,"decimal"      ],
        "date"      => ["input-text"    ,"date"         ],
        "datetime"  => ["input-text"    ,"datetime"     ],
        "text"      => ["textarea"      ,""             ],
        "ckeditor"  => ["textarea"      ,"ck-small"     ]
    ];

    return includes__load_componente("forms", [
        "type"	  		=> $config[$registro["Tipo"]][0],
        "label"   		=> $registro["Titulo"],
        "id"      		=> $registro["Slug"],
        "name"    		=> $registro["uuid"],
        "help-block"    => $registro["Descricao"],
        "form-group" 	=> true,
        "class"   		=> $config[$registro["Tipo"]][1],
        "col-grid"		=> "",
        "rows"    		=> 5,
        "value"   		=> formatacao__mysql_exibicao("text", $registro["Valor"]),
    ]);
}
