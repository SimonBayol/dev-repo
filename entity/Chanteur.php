<?php
namespace entity;

class Chanteur {
    private $id;
    private $nom;
    private $prenom;
    private $tessiture;
    private $dateEntree;
    private $fonction;
    
    function __construct($id, $nom, $prenom, $tessiture, $dateEntree, $fonction = NULL) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tessiture = $tessiture;
        $this->dateEntree = $dateEntree;
        $this->fonction = $fonction;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getTessiture() {
        return $this->tessiture;
    }

    public function setTessiture($tessiture) {
        $this->tessiture = $tessiture;
    }

    public function getDateEntree() {
        return $this->dateEntree;
    }

    public function setDateEntree($dateEntree) {
        $this->dateEntree = $dateEntree;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }

    public function __toString() {
        return "$this->prenom"."&nbsp;"."$this->nom ";
    }
    
    public function toJsonArray() {
        $table = array(
            'id'        => $this->id,
            'nom'       => $this->nom,
            'prenom'    => $this->prenom,
            'fonction'  => $this->fonction,
            'tessiture' => $this->tessiture
        );
        return json_encode($table);
    }

}

?>
