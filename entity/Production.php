<?php
namespace entity;
/**
 * Description of Production
 *
 * @author Simon
 */
class Production {
    private $id;
    private $nom;
    private $contenu;
    private $date;
    
    function __construct($id, $nom, $contenu, $date) {
        $this->id = $id;
        $this->nom = $nom;
        $this->contenu = $contenu;
        $this->date = $date;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getDate() {
        return $this->date;
    }



}

?>
