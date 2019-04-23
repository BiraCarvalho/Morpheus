<section>

	<header class="d-none">
		<h2 id="pagina--titulo">Dashboard | Questionários</h2>
	</header>
    
    <?=alert__show(__NAMESPACE)?>
    
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <?php $navtab_count = 0; ?>
                <?php foreach( questionarios__getAll() as $questionario){ ?>
                <?php $navtab_active = $navtab_count === 0 ? 'active' : '' ; $navtab_count++; ?>
                <li class="nav-item">
                    <a class="nav-link text-reset <?=$navtab_active?>" data-toggle="tab" href="#<?=$questionario['Slug']?>"><?=$questionario['Titulo']?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <?php $tabpane_count = 0; ?>
            <?php foreach( questionarios__getAll() as $questionario){ ?>
            <?php $tabpane_active = $tabpane_count === 0 ? 'show active' : '' ; $tabpane_count++; ?>
            <div id="<?=$questionario['Slug']?>" class="tab-pane card-body <?=$tabpane_active?>">
                
                <div class="header d-flex">
                    <h3><?=$questionario['Titulo']?></h3>
                    <a class="btn btn-sm btn-primary ml-auto align-self-start" href="/questionarios/<?=$questionario['Slug']?>?op=novo">Realizar um novo teste</a>
                </div>
                <hr>

                <h4 class="pb-3">Resultados</h4>

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