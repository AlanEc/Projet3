<?php
require('../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$manager = new NewsManager($db);

$manager->updateCommentaire($_GET['id']);
header('Location: ../vues/article.php');

?>