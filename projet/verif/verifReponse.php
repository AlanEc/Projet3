<?php
require('../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$manager = new NewsManager($db);

/* Verification du commentaire */
$donneesCommentaire = [
'auteurC' => $_POST['auteurC'],
'contC' => $_POST['contC'],
'id_article' => $_SESSION['idb'], 
'id_reponse' => $_GET['idr'],
];

$_SESSION['donneesCommentaire'] = $donneesCommentaire;

if (isset($_POST['ajouterReponse'])) {
    $c = new reponses ($donneesCommentaire);
    $manager->addReponse($c);
}
    
else {
    unset($comment);
    echo "Veuillez remplir tous les champs";
}

if (isset($_POST['auteurC'])) {
    header('Location: ../vues/article.php');
}
?>