<?php
class reponses {    
    private $_id,
            $_auteurC,
            $_contC,
            $_id_article,
            $_id_reponse;

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
    

public function id() {
    return $this->_id;
  }
  
public function auteurC() {
    return $this->_auteurC;
  }
    
public function contC() {
    return $this->_contC;
  }
    
public function id_article() {
    return $this->_id_article;
  }

public function id_reponse() {
    return $this->_id_reponse;
  }
    
public function setId($id) {
    $id = (int) $id;

    if ($id > 0) {
      $this->_id = $id;
    }
  }

public function setId_article($id_article) {
    $id_article = (int) $id_article;

    if ($id_article > 0) {
      $this->_id_article = $id_article;
    }
  }
    
public function setId_reponse($id_reponse) {
    $id_reponse = (int) $id_reponse;

    if ($id_reponse > 0) {
      $this->_id_reponse = $id_reponse;
    }
  }
  
public function setAuteurC($auteurC) {
    if (is_string($auteurC)) {
      $this->_auteurC = $auteurC;
    }
  }
  
public function setContC($contC) {
    if (is_string($contC)) {
      $this->_contC = $contC;
    }
  } 
  
}
