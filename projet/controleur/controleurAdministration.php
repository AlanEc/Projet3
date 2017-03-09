<?php 
require '../bootstrap.php'; 
$NewsManager = new NewsManager($db);
$CommentaireManager = new CommentaireManager($db);

if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
}
if (isset($_GET['idArticle'])) {
  $news = $NewsManager-> get($_GET['idArticle']);
}

$articles = $NewsManager->getList(); 
$commentSignaler = $CommentaireManager->estSignale(); 
$comment = $CommentaireManager->getList(); 
require '../vues/administration.php'; 

