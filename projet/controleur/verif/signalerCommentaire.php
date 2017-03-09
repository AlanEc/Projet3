<?php
require('../../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$CommentaireManager = new CommentaireManager($db);

$CommentaireManager->update($_GET['id']);
header('Location: ../controleurArticle.php');