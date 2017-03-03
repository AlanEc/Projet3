<?php
require '../bootstrap.php'; 

if (isset($_POST['pass'])) {
    $passe = $_POST['pass'];
}

if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
}
      
// Récupération des données du membre
$req = $db->prepare('SELECT id FROM passe WHERE identifiant = :identifiant AND MotPasse = :MotPasse');
$req->execute(array(
    'identifiant' => $pseudo,
    'MotPasse' => $passe));
$resultat = $req->fetch();

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
}

// Connexion et création de la session
else {
    $_SESSION['id'] = $resultat;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['pass'] = $passe;

    // Membre enregistré au sein d'un cookie
    if (isset($_POST['auto'])){
        setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);                               
        setcookie('pass', $passe, time() + 365*24*3600, null, null, false, true);
    }
header('Location: ../vues/administration.php');
}

?>