<?php 

$indice     = questionarios__getIndiceByUuid($indiceUuid);
$conclusoes = questionario__getConclusoesByIndices($indice['Id']);
$grafico    = questionario__getResultadoToGraphic($indice['Id']);

?>
<section class="resultados--section">

	<header class="d-none">
		<h2 id="pagina--titulo">Resultado | Questionários</h2>
	</header>
    
    <?=alert__show(__NAMESPACE)?>
    <form id="form-main-questionario-conclusao" action="/<?=$secao_slug?>/<?=$slug?>?uuid=<?=$indiceUuid?>" method="POST" enctype="multipart/form-data" class="pt-4 pb-2" >
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">

                <div class="p-4">
                    <div id="chartdiv"></div>
                </div>

                <input id="op"  name="op" type="hidden" value="conclusoes-salvar" >
                <input id="cid" name="Id" type="hidden" value="<?=$conclusoes["Id"]?>" >
                <input id="qid" name="QuestionariosIndiceId" type="hidden" value="<?=$indice['Id']?>" >

                <input id="redirect_url" name="redirect_url" type="hidden" value="/<?=$secao_slug?>/<?=$slug?>?uuid=<?=$indiceUuid?>" >
                
                <div class="form-group">
                    <label for="Texto1">O que isso significa para você?</label>
                    <textarea name="Texto1" class="form-control" rows="9" ><?=stripslashes($conclusoes["Texto1"])?></textarea>
                </div>

                <div class="form-group">
                    <label for="Texto2">O que eu você se dá conta, o que você precisa trabalhar?</label>
                    <textarea name="Texto2" class="form-control" rows="9"><?=stripslashes($conclusoes["Texto2"])?></textarea>
                </div>

                <div class="form-group">
                    <label for="Texto3">Qual é a sua responsabilidade para o desenvolvimento do ALINHAR na sua Organização?</label>
                    <textarea name="Texto3" class="form-control" rows="9"><?=stripslashes($conclusoes["Texto3"])?></textarea>
                </div>

            </div>
            <div class="card-footer d-flex">
                <a href="/dashboard" class="btn btn-light">Voltar ao Dashboard</a>
                <button type="submit" class="btn btn-primary ml-auto">Salvar</button>
            </div>
        </div>
    </form>
</section>

<?php require __DIR__ . '/parts/grafico.part.php'; ?>