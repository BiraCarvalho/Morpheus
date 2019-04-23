<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/funcoes.php";

$indiceUuid = sessions__get('QUESTIONARIO__INDICE_UUID');

$questionario = questionarios__getBySlug($slug);
$indice 	  = questionarios__getIndiceByUuid($indiceUuid);
$respostas    = questionarios__getRespostas($indice['Id']);

?>
<section>
	
	<header class="d-none">
		<h2 id="pagina--titulo"><?=$questionario['Titulo']?></h2>
	</header>

	<?=$questionario['Texto'] ? $questionario['Texto'] : ''; ?>

	<?php if( $perguntas = questionarios__getPerguntas($indice['QuestionariosId'])){ ?>
		<?php foreach( $perguntas as $pergunta ){ ?>
		<?php $resposta_valor = isset($respostas[$pergunta['Id']]) ? $respostas[$pergunta['Id']] : 0; ?>
		<div id="pergunta_<?=$pergunta['Id'];?>" class="questionarios--pergunta card border-dark mb-3" >
			<div class="card-body text-dark">
				<h5 class="card-title"><?=$pergunta['Ordem'];?>. <?=stripslashes($pergunta['Titulo']);?></h5>
				<div class="card-text text-muted"><?=stripslashes($pergunta['Texto']);?></div>
			</div>
			<div class="card-footer d-flex flex-wrap justify-content-center">
				<?php for( $escala_id = 1; $escala_id <= (int)$questionario['Escala']; $escala_id++ ){ ?>
					<?php $resposta_active = $escala_id == $resposta_valor ? "active" : ""; ?>
					<button id="resposta_<?=$escala_id;?>" type="button" class="questionarios--resposta flex-fill m-1 btn btn-lg btn-outline-secondary <?=$resposta_active?>" 
					autocomplete     = "off"
					data-cadastro-id = "<?=$cadastro["Id"]?>"
					data-pergunta-id = "<?=$pergunta['Id'];?>"
					value="<?=$escala_id;?>"
					>
					<?=$escala_id;?>
					</button>
				<?php } ?>
			</div>
		</div>
		<?php }?>
	<?php }?>

</section>