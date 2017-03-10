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
        $requete = $this->db->prepare('INSERT INTO news(auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');
        $requete->bindValue(':titre', $article->titre());
        $requete->bindValue(':auteur', $article->auteur());
        $requete->bindValue(':contenu', $article->contenu());

        $requete->execute();

        $article->hydrate([
          'id' => $this->db->lastInsertId()
        ]);         
    }

    public function get($id) {
        $req = $this->db->prepare('SELECT id, auteur, titre, contenu, dateAjout FROM news WHERE id = ? LIMIT 1');
        $req->execute([$id]);

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new News($donnees);
    }

    public function getList()  {
        $articles = [];
        $q = $this->db->prepare('SELECT * FROM news ORDER BY id DESC LIMIT 0, 5');
        $q->execute();

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new News($donnees);
        }
        return $articles;
    }

    public function delete($id) {
        $requete = $this->db->prepare('DELETE FROM news WHERE id = ?');
        $requete->execute([$id]);
        
        $requete = $this->db->prepare('DELETE FROM commentaire WHERE idArticle = ?');
        $requete->execute([$id]);
    }

    public function update($article) {
        $q = $this->db->prepare('UPDATE news SET titre = :titre, auteur = :auteur, contenu = :contenu, dateModif = NOW() WHERE id = :id');

        $q->bindValue(':titre', $article->titre(), PDO::PARAM_STR);
        $q->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);
        $q->bindValue(':contenu', $article->contenu(), PDO::PARAM_STR);
        $q->bindValue(':id', $article->id(), PDO::PARAM_INT);
        $q->execute();
    }
}
?>