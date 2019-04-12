<?php

$consulta = "SELECT * 
                FROM Questionarios AS questionarios
                WHERE questionarios.Situacao = '1'
                AND questionarios.Arquivado = '0'
                AND questionarios.Data <= NOW()
            ORDER BY Id ASC";

$questionarios = global__db()->fetchAll($consulta);

?>
<section>

	<header class="d-none">
		<h2 id="pagina--titulo">Dashboard | Questionários</h2>
	</header>
    
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <?php $navtab_count = 0; ?>
                <?php foreach( $questionarios as $questionario){ ?>
                <?php $navtab_active = $navtab_count === 0 ? 'active' : '' ; $navtab_count++; ?>
                <li class="nav-item">
                    <a class="nav-link <?=$navtab_active?>" data-toggle="tab" href="#<?=$questionario['Slug']?>"><?=$questionario['Titulo']?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <?php $tabpane_count = 0; ?>
            <?php foreach( $questionarios as $questionario){ ?>
            <?php $tabpane_active = $tabpane_count === 0 ? 'show active' : '' ; $tabpane_count++; ?>
            <div id="<?=$questionario['Slug']?>" class="tab-pane card-body <?=$tabpane_active?>">
                
                <div class="controles d-flex">
                    <a class="btn btn-sm btn-primary ml-auto" href="/questionarios/<?=$questionario['Slug']?>?op=novo">Realizar um novo teste</a>
                </div>
                <hr>

                <h3>Resultados</h3>
                <ul>
                    <li><a href="#">01/01/2019</a></li>
                    <li><a href="#">01/02/2019</a></li>
                    <li><a href="#">01/03/2019</a></li>
                </ul>

            </div>
            <?php } ?>
        </div>
    
    </div>
</section>