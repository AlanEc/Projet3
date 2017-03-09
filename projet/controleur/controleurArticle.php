<?php require '../bootstrap.php'; 


$NewsManager = new NewsManager($db);
$CommentaireManager = new CommentaireManager($db);
if (isset($_GET['idArticle']) AND !empty($_GET['idArticle'])) {
$id = $_GET['idArticle'];
$_SESSION['idArticle']= $id;
}

if (isset($_SESSION['idArticle'])) {
$id = $_SESSION['idArticle'];
$commentaires = $CommentaireManager->get($id);
$article = $NewsManager->get($id);
foreach ($commentaires as $unCom) {
$id = $unCom->id(); 
$reponses = $CommentaireManager->getReponses($id); }
}

require '../vues/article.php'; 