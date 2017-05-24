<?php 
require '../bootstrap.php'; 
$articles = $articleManager->recupererTousLesArticles(); 
require '../vues/accueil.php';

