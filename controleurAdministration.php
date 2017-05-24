<?php 
require '../bootstrap.php'; 

if (!isset($_SESSION['id'])) {
    header('Location: /Projet3/controleur/controleurConnexion.php');
    die();
}

if (isset($_GET['idArticle'])) {
  $articleAModifier = $articleManager-> recupererArticleParID($_GET['idArticle']);
}

if(isset($_GET['supprime']) AND $_GET['supprime'] == "ok") {
	$supprime = $_GET['supprime'];
} 

if(isset($_GET['ajoute']) AND $_GET['ajoute'] == "ok") {
	$ajoute = $_GET['ajoute'];
} 

$articles = $articleManager->recupererTousLesArticles(); 
$commentairesSignales = $commentaireManager->recupererCommentairesSignale(); 
$commentaires = $commentaireManager->recupererTousLesCommentaires(); 
require '../vues/administration.php'; 

