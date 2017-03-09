<?php
require('../../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$CommentaireManager = new CommentaireManager($db);
$NewsManager = new NewsManager($db);

if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $id = $_GET['id'];
    $NewsManager->delete($id);
}

if (isset($_GET['idCommentaire']) AND !empty($_GET['idCommentaire'])) {
    $id = $_GET['idCommentaire'];
    $CommentaireManager->delete($id);
}

header('Location: ../controleurAdministration.php');
