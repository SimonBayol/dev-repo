<?php
namespace entity;
class User {
    private $id;
    private $nom;
    private $mdp;
    private $niveau;
    
    function __construct($id, $nom, $mdp, $niveau) {
        $this->id = $id;
        $this->nom = $nom;
        $this->mdp = $mdp;
        $this->niveau = $niveau;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getNiveau() {
        return $this->niveau;
    }



}

?>
