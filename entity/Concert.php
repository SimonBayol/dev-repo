<?php
namespace entity;

use \DateTime;
/**
 * Description of Concert
 *
 * @author Simon
 */
class Concert {
    private $id;
    private $nom;
    private $description;
    private $adresse;
    private $date;
    private $affiche;
    private $tarif;
    
    function __construct($id, $nom, $description, $adresse, DateTime $date, $affiche, $tarif) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->adresse = $adresse;
        $this->date = $date;
        $this->affiche = $affiche;
        $this->tarif = $tarif;
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

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getAffiche() {
        return $this->affiche;
    }

    public function setAffiche($affiche) {
        $this->affiche = $affiche;
    }

    public function getTarif() {
        return $this->tarif;
    }

    public function setTarif($tarif) {
        $this->tarif = $tarif;
    }



}

?>
