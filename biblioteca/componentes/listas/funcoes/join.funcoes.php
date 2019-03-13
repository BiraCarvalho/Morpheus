<?php

function listas__get_join($tabela, $config)
{
    $join         = "";
    $join_tabela  = "";
    $join_tabelas = [];

    foreach ($config as $item) {
        
        $join_tabela    =  $item[1];
        
        if(empty($item[5])){
            $join_tabela_pk = "`{$join_tabela}`.`Id` = `{$tabela}`.`{$join_tabela}Id`" ;
        } else {
            $join_tabela_pk = "`{$join_tabela}`.`Id` = `{$tabela}`.`{$item[5]}`";
        }
        
 
        if ($join_tabela != $tabela && !in_array($item[1], $join_tabelas)) {
            $join .= " LEFT JOIN `{$join_tabela}` ON {$join_tabela_pk}";
            $join_tabelas[] = $join_tabela;
        }
    
    }

    return $join;
}
