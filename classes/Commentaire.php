<?php
class Commentaire {    
    private $_id,
            $_auteur,
            $_contenu,
            $_idArticle,
            $_idParent,
            $_signaler,
            $reponses = [];

public function __construct(array $donneesCommentaire) {
    $this->hydrate($donneesCommentaire);
  }
    
 public function hydrate(array $donneesCommentaire) {
    foreach ($donneesCommentaire as $key => $value) {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

public function reponses() {
        return $this->reponses;
    }
    
public function ajouterReponsesAuCommentaire($reponse) {
        $this->reponses[] = $reponse;
    }

public function id() {
    return $this->_id;
  }

public function auteur() {
    return $this->_auteur;
  }
    
public function contenu() {
    return $this->_contenu;
  }
    
public function idArticle() {
    return $this->_idArticle;
  }
    
public function idParent() {
    return $this->_idParent;
  }
    
public function signaler() {
    return $this->_signaler;
  }
    
public function setId($id) {
    $id = (int) $id;

    if ($id > 0) {
      $this->_id = $id;
    }
  }

public function setIdArticle($idArticle) {
    $idArticle = (int) $idArticle;

    if ($idArticle > 0) {
      $this->_idArticle = $idArticle;
    }
  }
    
public function setIdParent($idParent) {
    $idParent = (int) $idParent;

    if ($idParent > 0) {
      $this->_idParent = $idParent;
    }
  }
    
public function setSignaler($signaler) {
    $signaler = (int) $signaler;

    if ($signaler > 0) {
      $this->_signaler = $signaler;
    }
  }
  
public function setAuteur($auteur) {
    if (is_string($auteur)) {
      $this->_auteur = $auteur;
    }
  }
  
public function setContenu($contenu) {
    if (is_string($contenu)) {
      $this->_contenu = $contenu;
    }
  } 
  
}
