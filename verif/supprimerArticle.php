<?php
require('../../bootstrap.php');

if (!isset($_SESSION['id'])) {
    header('Location: ../controleurConnexion.php');
    die();
}

if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $id = $_GET['id'];
    $articleManager->supprimer($id);
}

if (isset($_GET['idCommentaire']) AND !empty($_GET['idCommentaire'])) {
    $id = $_GET['idCommentaire'];
    $commentaireManager->supprimer($id);
}

header('Location: ../controleurAdministration.php?supprime=ok');
