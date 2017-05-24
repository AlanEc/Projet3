<?php
require('../../bootstrap.php');

if (isset($_GET['idCommentaire']) AND !empty($_GET['idCommentaire'])) {
    $id = $_GET['idCommentaire'];

    $ommentaireEnfant = $commentaireManager->recupererReponses($id);

	foreach ($commentaireEnfant as $unEnfant)  {
		$idEnfant = $unEnfant->id();
	}

    $commentaireManager->supprimer($id);

    for ($i = 0; $idEnfant == $id + 1; $i++) {

     $ommentaireEnfant = $commentaireManager->recupererReponses($idEnfant);

	foreach ($commentaireEnfant as $unEnfant)  {
		$id = $unEnfant->id();
	}	

	$commentaireManager->supprimer($idEnfant);
      
    $ommentaireEnfant = $commentaireManager->recupererReponses($id);

	foreach ($commentaireEnfant as $unEnfant)  {
		$idEnfant = $unEnfant->id();
	}	

}
}

header('Location: ../controleurAdministration.php?supprime=ok');


