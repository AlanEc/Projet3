<?php
require('../../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$manager = new CommentaireManager($db);

/* Verification du commentaire */
$donneesCommentaire = [
  'auteur' => $_POST['auteur'],
  'contenu' => $_POST['contenu'],
  'idArticle' => $_SESSION['idArticle'],
];

if (isset($_POST['ajouterCommentaire'])) {
    $c = new Commentaire ($donneesCommentaire);
    $manager->add($c);
}
    
else {
    unset($comment);
    echo "Veuillez remplir tous les champs";
}

if (isset($_POST['auteur'])) {
    header('Location: ../controleurArticle.php');
}


  