<?php
require('../../bootstrap.php');

$commentaireManager->actionSignaler($_GET['id']);
header('Location: ../controleurArticle.php?signale=ok&idArticle='. $_SESSION['idDernierArticleVisite']);