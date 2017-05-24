<?php
require('../../bootstrap.php');

if (!isset($_SESSION['id'])) {
    header('Location: ../controleurConnexion.php');
    die();
}

$commentaireManager->actionSignaler($_GET['id']);
header('Location: ../controleurArticle.php?signale=ok&idArticle='. $_SESSION['idDernierArticleVisite']);