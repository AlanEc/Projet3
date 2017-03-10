<?php
function chargerClasse($classe) {
  require ('classes/' . $classe  . '.php');
}

spl_autoload_register('chargerClasse');

session_start();

try {
  $db = new PDO('mysql:host=localhost;dbname=systnew', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
} catch(Exception $e){ 
  die('Erreur : ' .$e->getMessage());  
}



