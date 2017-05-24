<?php 
require '../bootstrap.php'; 

if(isset($_SESSION["id"])) {
    header('Location: controleurAdministration.php');
    die();
} 

if(isset($_GET['mauvaisMdp']) AND $_GET['mauvaisMdp'] == "ok") {
	$mauvaisMdp = $_GET['mauvaisMdp'];
} 

require '../vues/connexion.php'; 