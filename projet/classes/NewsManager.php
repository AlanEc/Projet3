<?php
if(!isset($_SESSION))
{
session_start();
}

class NewsManager {
  private $db; // Instance de PDO
    
  public function __construct($db) {
    $this->db = $db;
  }

  public function add(News $article) {
    $requete = $this->db->prepare('INSERT INTO news(auteur, titre, cont, dateAjout, dateModif) VALUES(:auteur, :titre, :cont, NOW(), NOW())');
    $requete->bindValue(':titre', $article->titre());
    $requete->bindValue(':auteur', $article->auteur());
    $requete->bindValue(':cont', $article->cont());

    $requete->execute();

    $article->hydrate([
      'id' => $this->db->lastInsertId()
    ]);         
  }
    
  public function addComment(Commentaires $c) {
    $requete = $this->db->prepare('INSERT INTO commentaire(auteurC, contC, id_article, signaler) VALUES(:auteurC, :contC, :id_article, :signaler)');
    $requete->bindValue(':auteurC', $c->auteurC());
    $requete->bindValue(':contC', $c->contC());
    $requete->bindValue(':id_article', $c->id_article());
    $requete->bindValue(':signaler', '0' );

    $requete->execute();

    $c->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);         
  }
    
  public function addReponse(Reponses $c) {
    $requete = $this->db->prepare('INSERT INTO commentaire(auteurC, contC, id_article, id_reponse, signaler) VALUES(:auteurC, :contC, :id_article, :id_reponse, :signaler)');
    $requete->bindValue(':auteurC', $c->auteurC());
    $requete->bindValue(':contC', $c->contC());
    $requete->bindValue(':id_article', $c->id_article());
    $requete->bindValue(':id_reponse', $c->id_reponse());
    $requete->bindValue(':signaler', '0' );

    $requete->execute();

    $c->hydrate([
      'id' => $this->db->lastInsertId()
    ]);         
  }

  public function get($id) {
      $req = $this->db->prepare('SELECT id, auteur, titre, cont, dateAjout FROM news WHERE id = ? LIMIT 1');
      $req->execute([$id]);
      
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    return new News($donnees);
  }
    
  public function getList()  {
    $articles = [];
    $q = $this->db->prepare('SELECT * FROM news ORDER BY id DESC LIMIT 0, 5');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $articles[] = new News($donnees);
    }
    return $articles;
  }
    
  public function getListComment()  {
    $comment = [];
    $q = $this->db->prepare('SELECT * FROM commentaire ORDER BY id DESC');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comment[] = new commentaires($donnees);
    }
    return $comment;
  }

  public function getSignalerComment()  {
    $comment = [];
    $q = $this->db->prepare('SELECT * FROM commentaire  WHERE signaler = \'1\' ORDER BY id DESC');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comment[] = new commentaires($donnees);
    }
    return $comment;
  }
    
  public function getCommentaires($id)  {
    $commentaires = [];
    $q = $this->db->prepare('SELECT * FROM commentaire WHERE id_article = ? HAVING id_reponse IS NULL');
    $q->execute([$id]);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $commentaires[] = new commentaires($donnees);
    }
    return $commentaires;
  }
    
  public function getReponses($id)  {
    $reponses = [];
    $q = $this->db->prepare('SELECT * FROM commentaire WHERE id_reponse = ?');
    $q->execute([$id]);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $reponses[] = new reponses($donnees);
    }
    return $reponses;
  }
    
 public function delete($id) {
    $requete = $this->db->prepare('DELETE FROM news WHERE id = ?');
    $requete->execute([$id]);
     
    $requete = $this->db->prepare('DELETE FROM commentaire WHERE id_article = ?');
    $requete->execute([$id]);
  }
    
 public function deleteCommentaire($idc) {
    $requete = $this->db->prepare('DELETE FROM commentaire WHERE id = ?');
    $requete->execute([$idc]);
  }

  public function update($article) {
    $q = $this->db->prepare('UPDATE news SET titre = :titre, auteur = :auteur, cont = :cont, dateModif = NOW() WHERE id = :id');

    $q->bindValue(':titre', $article->titre(), PDO::PARAM_STR);
    $q->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);
    $q->bindValue(':cont', $article->cont(), PDO::PARAM_STR);
    $q->bindValue(':id', $article->id(), PDO::PARAM_INT);
    $q->execute();
  }
    
 public function updateCommentaire($id) {
    $q = $this->db->prepare('UPDATE commentaire SET signaler = 1 WHERE id = ?');
    $q->execute([$id]);
  }
    
 public function getUnique($id) {
    $req = $this->db->prepare('SELECT * FROM news WHERE id = ? LIMIT 1');
      $req->execute([$id]);
      
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    return new News($donnees);
  }    
}
?>