<?php

use Pagerfanta\Adapter\FixedAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\View\TwitterBootstrap3View ;

sessions__set("__modulo", $dados["modulo"]);

$routeGenerator = function($page) {
    $modulo = sessions__get("__modulo");
    return "?" . __ADMIN_MODULO_QUERY_VAR . "={$modulo}&" . __ADMIN_PAGINA_QUERY_VAR . "={$page}";
};

$nbResults = $dados["count"];

$adapter    = new FixedAdapter($nbResults, []);
$pagerfanta = new Pagerfanta($adapter);
$view       = new TwitterBootstrap3View();
$current    = sessions__get("__pagina");

$pagerfanta->setMaxPerPage(sessions__get("__offset"));

if( $current > $pagerfanta->getNbPages() ){
    $current = $pagerfanta->getNbPages();
}

$pagerfanta->setCurrentPage($current);

$options = array(
    'css_container_class' => 'pagination pagination-sm',
    'proximity'            => 3,
    'prev_message'         => '<span class="glyphicon glyphicon-triangle-left"></span>',
    'next_message'         => '<span class="glyphicon glyphicon-triangle-right"></span>'
);

echo $view->render($pagerfanta, $routeGenerator, $options);
