<?php
namespace entity;

class Article {
    private $category;
    private $titre;
    private $texte;
    private $image;
    
    function __construct($category,$titre, $texte,$image='') {
        $this->category = $category;
        $this->titre = $titre;
        $this->texte = $texte;
        $this->image = $image;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getTexte() {
        return $this->texte;
    }

    public function setTexte($texte) {
        $this->texte = $texte;
    }
    
    public function getImage() {
        return $this->image;
    }
    public function getImageMini() {
        return PHOTO_DIR."mini_photo_arthemys_$this->image";
    }
    public function getImageFull() {
        return PHOTO_DIR."photo_arthemys_$this->image";
    }

}

?>
