<?php
class ArticleManager {
    private $db; // Instance de PDO

    public function __construct($db) {
        $this->db = $db;
    }

    public function ajouter(Article $article) {
        $requete = $this->db->prepare('INSERT INTO article(auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');
        $requete->bindValue(':titre', $article->titre());
        $requete->bindValue(':auteur', $article->auteur());
        $requete->bindValue(':contenu', $article->contenu());

        $requete->execute();

        $article->hydrate([
          'id' => $this->db->lastInsertId()
        ]);         
    }

    public function recupererArticleParID($id) {
        $req = $this->db->prepare('SELECT id, auteur, titre, contenu, dateAjout FROM article WHERE id = ? LIMIT 1');
        $req->execute([$id]);

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        if ($donnees == NULL){
            header('Location: ../vues/error/error_404.php'); } 
        else {
            return new Article($donnees);
    }
    }
    
    public function recupererArticlesParPage($depart, $articlesParPage)  {
        $articles = [];
        $requete = $this->db->prepare('SELECT * FROM article ORDER BY id DESC LIMIT '.$depart.','.$articlesParPage );
        $requete->execute();

        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($donnees);
        }
        return $articles;
    }

     public function recupererTousLesArticles()  {
        $articles = [];
        $requete = $this->db->prepare('SELECT * FROM article ORDER BY id DESC');
        $requete->execute();

        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($donnees);
        }
        return $articles;
    }


    public function recupererNombreArticles()  {
        $articles = [];
        $requete = $this->db->query('SELECT id FROM article');
        return $requete;
    }


    public function supprimer($id) {
        $requete = $this->db->prepare('DELETE FROM commentaire WHERE idArticle = ?');
        $requete->execute([$id]);
        
        $requete = $this->db->prepare('DELETE FROM article WHERE id = ?');
        $requete->execute([$id]);
    }

    public function modifier($article) {
        $requete = $this->db->prepare('UPDATE article SET titre = :titre, auteur = :auteur, contenu = :contenu, dateModif = NOW() WHERE id = :id');

        $requete->bindValue(':titre', $article->titre(), PDO::PARAM_STR);
        $requete->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);
        $requete->bindValue(':contenu', $article->contenu(), PDO::PARAM_STR);
        $requete->bindValue(':id', $article->id(), PDO::PARAM_INT);
        $requete->execute();
    }
}
?>