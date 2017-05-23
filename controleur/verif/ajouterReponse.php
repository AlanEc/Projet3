<?php
require('../../bootstrap.php');

/* Verification du commentaire */
if(!empty($_POST['auteur'] && $_POST['contenu'])) {
	$donneesCommentaire = [
	'auteur' => $_POST['auteur'],
	'contenu' => $_POST['contenu'],
	'idArticle' => $_GET['idArticle'], 
	'idParent' => $_GET['idParent'],
	];

	if (isset($_POST['ajouterReponse'])) {
	    $reponse = new Commentaire ($donneesCommentaire);
	    $commentaireManager->ajouter($reponse);
	}
	    
	else {
	    unset($comments);
	    echo "Veuillez remplir tous les champs";
	}

	if (isset($_POST['auteur'])) {
	    header('Location: ../controleurArticle.php?commentaireAjoute=ok&idArticle='. $_GET['idArticle']);
	}
} else {
	header('Location: ../controleurArticle.php?idArticle='. $_GET['idArticle']);
}