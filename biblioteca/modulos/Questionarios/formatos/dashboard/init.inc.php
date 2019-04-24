<section class="dashboard--section">

	<header class="d-none">
		<h2 id="pagina--titulo">Dashboard</h2>
	</header>
    
    <?=alert__show(__NAMESPACE)?>
    
    <div class="card">
        
        <div class="card-header d-flex">

            <h3 class="align-self-end">Resultados dos Testes</h3>

            <div class="dropdown ml-auto align-self-start">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" >
                    Realizar um Novo Teste
                </button>
                <div class="dropdown-menu">
                <?php foreach( questionarios__getAll() as $questionario){ ?>
                    <a class="dropdown-item" href="/questionarios/<?=$questionario['Slug']?>?op=novo"><?=$questionario['Titulo']?></a>
                <?php } ?>    
                </div>
            </div>

        </div>

        <ul class="list-group list-group-flush">
            <?php foreach( questionarios__getIndicesByCadastros($cadastro['Id']) AS $resultado ){ ?>
                <?php 
                if($resultado['RespostasCount'] < $resultado['PerguntasCount']){
                    continue;
                }  
                ?>
                <li class="list-group-item" >
                    <a class="px-2" href="/resultados/?uuid=<?=$resultado['uuid']?>" >
                        <?=formatacao__datahora_ptBR($resultado['Criacao'])?>
                    </a>
                    <a class="px-2" href="/resultados/?uuid=<?=$resultado['uuid']?>" >
                        <?=$resultado['Titulo']?>
                    </a>
                </li>
            <?php } ?>
        </ul>
        
    </div>
</section>