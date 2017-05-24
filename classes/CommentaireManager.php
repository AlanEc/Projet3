<?php
class CommentaireManager {
  private $db; // Instance de PDO
    
  public function __construct($db) {
    $this->db = $db;
  }
    
  public function ajouter(Commentaire $commentaire) {
    $requete = $this->db->prepare('INSERT INTO commentaire(auteur, contenu, idArticle, signaler, idParent) VALUES(:auteur, :contenu, :idArticle, :signaler, :idParent)');
    $requete->bindValue(':auteur', $commentaire->auteur());
    $requete->bindValue(':contenu', $commentaire->contenu());
    $requete->bindValue(':idArticle', $commentaire->idArticle());
    $requete->bindValue(':signaler', '0' );
    $requete->bindValue(':idParent', $commentaire->idParent());

    $requete->execute();

    $commentaire->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);         
  }
     
  public function recupererTousLesCommentaires()  {
    $commentaires = [];
    $requete = $this->db->prepare('SELECT * FROM commentaire ORDER BY id DESC');
    $requete->execute();

    while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
    {
      $commentaires[] = new Commentaire($donnees);
    }
    return $commentaires;
  }

  public function recupererCommentairesArticle($id)  {
    $commentaires = [];
    $requete = $this->db->prepare('SELECT * FROM commentaire WHERE idArticle = ? ORDER BY id ASC');
    $requete->execute([$id]);

    while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
    {
      $commentaires[] = new Commentaire($donnees);
    }

    $commentairesParId = [];
      
    foreach ($commentaires as $commentaire) {
      $commentairesParId[$commentaire->id()] = $commentaire;
    }
      
    foreach ($commentaires as $cle => $commentaire) {
           if ($commentaire->idParent() !== NULL) {
      
            $commentairesParId[$commentaire->idParent()] ->ajouterReponsesAuCommentaire($commentaire);  
            unset($commentaires[$cle]);
           }  
    }
    return $commentaires;
  }
    
  public function recupererReponses($idCommentaire)  {
    $reponses = [];
    $requete = $this->db->prepare('SELECT * FROM commentaire WHERE idParent = ? ORDER BY id');
    $requete->execute([$idCommentaire]);

    while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
    {
      $reponses[] = new Commentaire($donnees);
    }
    return $reponses;
  }
        
  public function recupererCommentairesSignale()  {
    $commentaires = [];
    $requete = $this->db->prepare('SELECT * FROM commentaire  WHERE signaler >= \'1\' ORDER BY id DESC');
    $requete->execute();

    while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
    {
      $commentaires[] = new Commentaire($donnees);
    }
    return $commentaires;
  }
    
 public function supprimer($id) {

    $requete = $this->db->prepare('DELETE FROM commentaire WHERE id = ?');
    $requete->execute([$id]);

    $requete1 = $this->db->prepare('SELECT * FROM commentaire WHERE idParent = ?');
    $requete1->execute([$id]);

    while ($donnees = $requete1->fetch(PDO::FETCH_ASSOC))
    {
      if (!empty($donnees)) {
       $idEnfant[] = new Commentaire($donnees);
      }

      foreach ($idEnfant as $unEnfant) {
        $this->supprimer($unEnfant->id());
      }
    } 
  }
    
 public function actionSignaler($id) {
    $requete = $this->db->prepare('UPDATE commentaire SET signaler = signaler + 1 WHERE id = ?');
    $requete->execute([$id]);
  } 
}
?>