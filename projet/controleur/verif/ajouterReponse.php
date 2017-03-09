<?php
require('../../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$CommentaireManager = new CommentaireManager($db);

/* Verification du commentaire */
$donneesCommentaire = [
'auteur' => $_POST['auteur'],
'contenu' => $_POST['contenu'],
'idArticle' => $_SESSION['idArticle'], 
'idReponse' => $_GET['idReponse'],
];

if (isset($_POST['ajouterReponse'])) {
    $c = new Commentaire ($donneesCommentaire);
    $CommentaireManager->add($c);
}
    
else {
    unset($comment);
    echo "Veuillez remplir tous les champs";
}

if (isset($_POST['auteur'])) {
    header('Location: ../controleurArticle.php');
}
?>