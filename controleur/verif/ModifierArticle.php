<?php
require('../../bootstrap.php');

/*Empecher l'accès */
if (!isset($_SESSION['id'])) {
    header('Location: /tp6/controleur/controleurConnexion.php');
    die();
}

/* Modification d'un Article */ 
if (isset($_POST['Modifier'])) {
$donnees = [
    'titre' => $_POST['titre'],
    'auteur' => $_POST['auteur'],
    'contenu' => $_POST['contenu'],
    'id'=> $_GET['id']
];
    $article = new Article ($donnees);
    $articleManager->modifier($article);
}
header('Location: ../controleurAdministration.php');
?>