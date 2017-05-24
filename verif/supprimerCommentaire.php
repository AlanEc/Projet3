<?php
require('../../bootstrap.php');

if (isset($_GET['idCommentaire']) AND !empty($_GET['idCommentaire'])) {
    $id = $_GET['idCommentaire'];
    $commentaireManager->supprimer($id);
}

header('Location: ../controleurAdministration.php?supprime=ok');


