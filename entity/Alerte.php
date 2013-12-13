<?php
namespace entity;

use \DateTime;

class Alerte {
    private $id;
    private $titre;
    private $contenu;
    private $detail;
    private $dateEnr;
    private $urgence;
    
    function __construct($id, $titre, $contenu, $detail,  DateTime $dateEnr, $urgence) {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->detail = $detail;
        $this->dateEnr = $dateEnr;
        $this->urgence = $urgence;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function getDetail() {
        return $this->detail;
    }

    public function setDetail($detail) {
        $this->detail = $detail;
    }

    public function getDateEnr() {
        return $this->dateEnr;
    }

    public function setDateEnr($dateEnr) {
        $this->dateEnr = $dateEnr;
    }

    public function getUrgence() {
        return $this->urgence;
    }

    public function setUrgence($urgence) {
        $this->urgence = $urgence;
    }


}

?>
