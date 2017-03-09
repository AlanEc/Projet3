<?php
if(!isset($_SESSION))
{
session_start();
}

class CommentaireManager {
  private $db; // Instance de PDO
    
  public function __construct($db) {
    $this->db = $db;
  }
    
  public function add(Commentaire $c) {
    $requete = $this->db->prepare('INSERT INTO commentaire(auteur, contenu, idArticle, signaler, idReponse) VALUES(:auteur, :contenu, :idArticle, :signaler, :idReponse)');
    $requete->bindValue(':auteur', $c->auteur());
    $requete->bindValue(':contenu', $c->contenu());
    $requete->bindValue(':idArticle', $c->idArticle());
    $requete->bindValue(':signaler', '0' );
    $requete->bindValue(':idReponse', $c->idReponse());

    $requete->execute();

    $c->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);         
  }
     
  public function getList()  {
    $comment = [];
    $q = $this->db->prepare('SELECT * FROM commentaire ORDER BY id DESC');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comment[] = new Commentaire($donnees);
    }
    return $comment;
  }

  public function get($id)  {
    $commentaires = [];
    $q = $this->db->prepare('SELECT * FROM commentaire WHERE idArticle = ? HAVING idReponse IS NULL ORDER BY id');
    $q->execute([$id]);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $commentaires[] = new Commentaire($donnees);
    }
    return $commentaires;
  }
    
  public function getReponses($id)  {
    $reponses = [];
    $q = $this->db->prepare('SELECT * FROM commentaire WHERE idReponse = ? ORDER BY id');
    $q->execute([$id]);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $reponses[] = new Commentaire($donnees);
    }
    return $reponses;
  }
        
  public function estSignale()  {
    $comment = [];
    $q = $this->db->prepare('SELECT * FROM commentaire  WHERE signaler = \'1\' ORDER BY id DESC');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comment[] = new Commentaire($donnees);
    }
    return $comment;
  }
    
 public function delete($id) {
    $requete = $this->db->prepare('DELETE FROM commentaire WHERE id = ?');
    $requete->execute([$id]);
  }
    
 public function update($id) {
    $q = $this->db->prepare('UPDATE commentaire SET signaler = 1 WHERE id = ?');
    $q->execute([$id]);
  } 
}
?>