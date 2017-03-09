<?php 
session_start();

if(isset($_COOKIE["pseudo"])) {
    header('Location: administration.php');
} 

if(isset($_SESSION["id"])) {
    header('Location: controleurAdministration.php');
} 

require '../vues/connexion.php'; 