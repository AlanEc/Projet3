<?php
class News {    
    private $_id,
            $_auteur,
            $_titre,
            $_cont,
            $_dateModif,
            $_dateAjout;

public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }
    
 public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
    
 public function resume() {
    $resume = substr($this->_cont, 0, 700);
    return $resume;
  }
    
public function id() {
    return $this->_id;
  }
  
public function auteur() {
    return $this->_auteur;
  }

public function titre() {
    return $this->_titre;
  }
    
public function cont() {
    return $this->_cont;
  }

public function dateModif() {
    return $this->_dateModif;
  }

public function dateAjout() {
    return $this->_dateAjout;
  }
    
public function setId($id) {
    $id = (int) $id;

    if ($id > 0) {
      $this->_id = $id;
    }
  }
  
public function setAuteur($auteur) {
    if (is_string($auteur)) {
      $this->_auteur = $auteur;
    }
  }
  
public function setTitre($titre) {
    if (is_string($titre)) {
      $this->_titre = $titre;
    }
  } 
  
public function setCont($cont) {
    if (is_string($cont)) {
      $this->_cont = $cont;
    }
  } 
  
public function setDateAjout($time) {
    $this->_dateAjout = $time;
  }

public function setDateModif($time1) {
    $this->_dateModif = (int) $time1;
  }  
}