<?php
require('../../bootstrap.php');

/*Empecher l'accès */
if (!isset($_SESSION['id'])) {
    header('Location: ../controleurConnexion.php');
    die();
}
/* Ajout d'un Article */ 
if (isset($_POST['Ajouter'])) {
$donnees = [
  'titre' => $_POST['titre'],
  'auteur' => $_POST['auteur'],
  'contenu' => $_POST['contenu']
];
  $article = new Article ($donnees);
  $articleManager->ajouter($article);
}

header('Location: ../controleurAdministration.php?ajoute=ok');
?>

