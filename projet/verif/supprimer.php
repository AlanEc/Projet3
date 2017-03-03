<?php
require('../bootstrap.php');

if(!isset($_SESSION)) {
session_start();
}

$manager = new NewsManager($db);

if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $id = $_GET['id'];
    $manager->delete($id);
}

if (isset($_GET['idc']) AND !empty($_GET['idc'])) {
    $idc = $_GET['idc'];
    $manager->deleteCommentaire($idc);
}

header('Location: ../vues/administration.php');
