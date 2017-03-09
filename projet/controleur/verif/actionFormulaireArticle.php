<?php
require('../../bootstrap.php');

$NewsManager = new NewsManager($db);

/* Ajout d'un Article */ 
if (isset($_POST['Ajouter'])) {
$donnees = [
  'titre' => $_POST['titre'],
  'auteur' => $_POST['auteur'],
  'contenu' => $_POST['contenu']
];
  $article = new News ($donnees);
  $NewsManager->add($article);
}

/* Modification d'un Article */ 
if (isset($_POST['Modifier'])) {
$donnees = [
    'titre' => $_POST['titre'],
    'auteur' => $_POST['auteur'],
    'contenu' => $_POST['contenu'],
    'id'=> $_GET['id']
];
    $article = new News ($donnees);
    $NewsManager->update($article);
}
header('Location: ../controleurAdministration.php');
?>

