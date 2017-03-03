<?php
require('../bootstrap.php');

$manager = new NewsManager($db);

/* Verification de l'article */

$donnees = [
  'titre' => $_POST['titre'],
  'auteur' => $_POST['auteur'],
  'cont' => $_POST['cont']
];

$_SESSION['donnees'] = $donnees;

if (isset($_POST['Ajouter'])) {
      $article = new News ($donnees);
      $manager->add($article);
}
    
  
if (isset($_POST['Modifier'])) {
$donnees = [
    'titre' => $_POST['titre'],
    'auteur' => $_POST['auteur'],
    'cont' => $_POST['cont'],
    'id'=> $_GET['id']
];
    $article = new News ($donnees);
    $manager->update($article);
}
    
if (isset($_POST['titre'])) {
 header('Location: ../vues/administration.php');
}
?>

