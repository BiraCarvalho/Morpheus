<article>

	<?php if( $conteudo['Titulo'] ){ ?>
	<header class="mb-4">
		<h2><?=$conteudo['Titulo']?></h2>
	</header>
	<?php }?>

	<h3 class="mb-4">Resultado</h3>

	<div class="card p-2">
		<!-- Gráfico -->
		<div id="chartdiv"></div>
	</div>

	<footer class="pagina-rodape">
		<div class="clearfix"></div>
	</footer>

</article>


<?php $resultado_alinhar = questionario__resultado_alinhar((int)$conteudo_id); ?>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = [{
    "name": "1",
    "points": <?=$resultado_alinhar[0]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-a1-filled-100.png"
}, {
    "name": "2",
    "points": <?=$resultado_alinhar[1]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-l-filled-100.png"
}, {
    "name": "3",
    "points": <?=$resultado_alinhar[2]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-i-filled-100.png"
}, {
    "name": "4",
    "points": <?=$resultado_alinhar[3]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-n-filled-100.png"
}, {
    "name": "5",
    "points": <?=$resultado_alinhar[4]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-h-filled-100.png"
}, {
    "name": "6",
    "points": <?=$resultado_alinhar[5]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-a2-filled-100.png"
}, {
    "name": "7",
    "points": <?=$resultado_alinhar[6]['Media']?>,
    "color": "#efefef",
    "bullet": "/site/assets/images/alinhar/icons8-r-filled-100.png"
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.inside = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
categoryAxis.renderer.labels.template.fontSize = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Do not crop bullets
chart.maskBullets = false;

// Remove padding
chart.paddingBottom = 0;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "points";
series.dataFields.categoryX = "name";
series.columns.template.propertyFields.fill = "color";
series.columns.template.propertyFields.stroke = "color";
series.columns.template.column.cornerRadiusTopLeft = 15;
series.columns.template.column.cornerRadiusTopRight = 15;
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

// Add bullets
var bullet = series.bullets.push(new am4charts.Bullet());
var image = bullet.createChild(am4core.Image);
image.horizontalCenter = "middle";
image.verticalCenter = "bottom";
image.dy = 20;
image.y = am4core.percent(100);
image.propertyFields.href = "bullet";
image.tooltipText = series.columns.template.tooltipText;
image.propertyFields.fill = "color";
image.filters.push(new am4core.DropShadowFilter());
</script>

