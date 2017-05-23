<?php require '../bootstrap.php'; 

if(isset($_GET['signale']) AND $_GET['signale'] == "ok") {
	$signale = $_GET['signale'];
} 
if(isset($_GET['commentaireAjoute']) AND $_GET['commentaireAjoute'] == "ok") {
	$commentaireAjoute = $_GET['commentaireAjoute'];
} 
$id = $_GET['idArticle'];
$_SESSION['idDernierArticleVisite'] = $id;
$commentaires = $commentaireManager->recupererCommentairesArticle($id); 
$article = $articleManager->recupererArticle($id);
require '../vues/article.php'; 
 

