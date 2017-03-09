<?php 
require '../bootstrap.php'; 
$NewsManager = new NewsManager($db);
$CommentaireManager = new CommentaireManager($db);
$articles = $NewsManager->getList(); 
$comment = $CommentaireManager->getList();
require '../vues/accueil.php';

