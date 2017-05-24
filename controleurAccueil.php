<?php 
require '../bootstrap.php'; 

$articlesParPage = 4;
$articlesTotalesRequete = $articleManager->recupererNombreArticles();
$articlesTotales = $articlesTotalesRequete->rowCount();
$pagesTotales = ceil($articlesTotales/$articlesParPage);

if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
	$_GET['page'] = intval($_GET['page']);
	$pageCourante = $_GET['page'];
} else {
	$pageCourante = 1;
}

$depart = ($pageCourante-1)*$articlesParPage;

$articles = $articleManager->recupererArticlesParPage($depart, $articlesParPage); 

require '../vues/accueil.php';

