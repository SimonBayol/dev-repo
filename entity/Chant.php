<?php
namespace entity;

class Chant {
    private $id;
    private $titre;
    private $compositeur;
    private $repertoire;
    private $repertoireId;
    
    function __construct($id, $titre, $compositeur, $repertoire = null, $repertoireId = null) {
        $this->id = $id;
        $this->titre = $titre;
        $this->compositeur = $compositeur;
        $this->repertoire = $repertoire;
        $this->repertoireId = $repertoireId;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getCompositeur() {
        return $this->compositeur;
    }

    public function getRepertoire() {
        return $this->repertoire;
    }

    public function getRepertoireId() {
        return $this->repertoireId;
    }
    
    public function __toString() {
        return "$this->titre, $this->compositeur";
    }
     public function toJsonArray() {
        $table = array(
            'id'        => $this->id,
            'titre'       => $this->titre,
            'compositeur'    => $this->compositeur,
            'repertoire'  => $this->repertoire,
            'repertoireId' => $this->repertoireId
        );
        return json_encode($table);
    }

}

?>
