<?php
require('../../bootstrap.php');

if (isset($_POST['pass'])) {
    $passe = $_POST['pass'];
}
      
// Récupération des données du membre
$requete = $db->prepare('SELECT * FROM membre');
$requete->execute();
$resultat = $requete->fetch();

if (password_verify($passe, $resultat['MotPasse'])) {
$_SESSION['id'] = $resultat;
header('Location: ../controleurAdministration.php');
}

else {
   header('Location: ../controleurConnexion.php?mauvaisMdp=ok');}
