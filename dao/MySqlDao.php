<?php
namespace dao;

use \PDO;
use entity\Article;
use entity\Chanteur;
use entity\Chant;
use entity\Production;
use entity\Concert;
use entity\User;
use entity\Background;
use entity\Photo;
use entity\Alerte;
use \DateTime;
use \Exception;

class MySqlDao {

private $dbh;

    public function __construct() {
        $attributes=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'UTF8'");
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD,$attributes);
        
    }
    public function getArticleByCategory($category){
        $sql = "SELECT titre,contenu,images FROM arth_article WHERE nom = :category;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        $titre = $result['titre'];
        $contenu = $result['contenu'];
        $image = $result['images'];
        $article = new Article($category, $titre, $contenu, $image);
        return $article;
    }
    public function updateArticle(Article $article){
        $sql = "UPDATE arth_article SET titre=:titre, contenu = :contenu, images = :images WHERE nom = :category;";
        $stmt = $this->dbh->prepare($sql);
        $category = $article->getCategory();
        $titre = $article->getTitre();
        $texte = $article->getTexte();
        $image = $article->getImage();
        
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':titre',  $titre);
        $stmt->bindParam(':contenu',  $texte);
        $stmt->bindParam(':images',  $image);
       
        return $stmt->execute();
    }
    public function getAllChanteurs(){
        $sql = "SELECT c.id, c.nom, c.prenom, c.tessiture, c.date, c.fonction FROM arth_chanteurs c";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $chanteurs = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $chanteurs[$row['tessiture']][] = new Chanteur($row['id'], $row['nom'], $row['prenom'], $row['tessiture'], $row['date'], $row['fonction']);
        } 
        return $chanteurs;
    }
    public function addChanteur(Chanteur $chanteur){
        $sql = "INSERT INTO arth_chanteurs (tessiture , nom, prenom, fonction , date) VALUES (:tessiture,:nom,:prenom,:fonction,:date)";
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute(array('tessiture' => $chanteur->getTessiture(), 'nom' => $chanteur->getNom() ,'prenom' => $chanteur->getPrenom(), 'fonction' => $chanteur->getFonction(), 'date'=>'2013'));
    }
    public function updateChanteur(Chanteur $chanteur){
        $sql = "UPDATE arth_chanteurs SET tessiture=:tessiture , nom=:nom, prenom=:prenom, fonction=:fonction , date=:date WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute(array('id' => $chanteur->getId(), 'tessiture' => $chanteur->getTessiture(), 'nom' => $chanteur->getNom() ,'prenom' => $chanteur->getPrenom(), 'fonction' => $chanteur->getFonction(), 'date'=>'2013'));
    }
    public function deleteChanteurById($id = null){
        $sql = "DELETE FROM arth_chanteurs WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getAllChants(){
        $sql = "SELECT r.id, r.compositeur, r.titre, prod.nom, prod.id as prod_id FROM arth_repertoire r JOIN arth_programme p ON r.id = p.fk_id_chant JOIN arth_productions prod ON p.fk_id_production = prod.id ORDER BY compositeur ASC";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $chants = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           $chants[] = new Chant($row['id'],$row['titre'],$row['compositeur'],$row['nom'],$row['prod_id']);
        } 
        return $chants;
    }
    private function getChantById($id){
        $sql = "SELECT r.id, r.compositeur, r.titre FROM arth_repertoire r WHERE r.id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $chant = new Chant($row['id'],$row['titre'],$row['compositeur']);
        return $chant;
    }
    public function addChant(Chant $chant){
        $sql = "INSERT INTO arth_repertoire (titre , compositeur) VALUES (:titre,:compositeur)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array('titre' => $chant->getTitre(), 'compositeur' => $chant->getCompositeur()));
        return $this->dbh->lastInsertId();
    }
    public function updateChant(Chant $chant){
        $sql = "UPDATE arth_repertoire SET titre=:titre , compositeur=:compositeur WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute(array('id' => $chant->getId(), 'titre' => $chant->getTitre(), 'compositeur' => $chant->getCompositeur()));
    }
    public function deleteChantById($id = null){
        $sql = "DELETE FROM arth_repertoire WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function deleteRelationRepProgByIdRep($id = null){
        $sql = "DELETE FROM arth_programme WHERE fk_id_chant = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function addRelationChantProduction($chant_id, $prod_id){
        $sql = "INSERT INTO arth_programme (fk_id_chant , fk_id_production) VALUES (:fk_id_chant,:fk_id_production)";
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute(array('fk_id_chant' => $chant_id, 'fk_id_production' => $prod_id));
    }
    public function getAllProgramme(){
        $sql = "SELECT prod.nom, p.fk_id_production, p.fk_id_chant FROM arth_productions prod, arth_programme p WHERE prod.id = p.fk_id_production";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $programme = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $programme[$row['nom']][] = $this->getChantById($row['fk_id_chant']);
        } 
        return $programme;
    }
    public function getAllProduction(){
        $sql = "SELECT nom FROM arth_productions";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $prodnames = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $prodnames[] = $row['nom'];
        }
        return $prodnames;
    }
    public function getAllProductionToArray(){
        $sql = "SELECT id,nom FROM arth_productions";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $prods = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $prods[] = array('id' => $row['id'], 'nom' => $row['nom']);
        }
        return $prods;
    }
    public function getProductionByName($name){
        $sql = "SELECT * FROM arth_productions WHERE nom = :name;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $nom = $result['nom'];
        $contenu = $result['contenu'];
        $date = $result['date'];
        $production = new Production($id, $nom, $contenu, $date) ;
        return $production;
    }
    public function getAllConcertAVenir(){
        $sql = "SELECT * FROM arth_concerts WHERE date >= now();";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $concerts = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $date = DateTime::createFromFormat('Y-m-d H:i:s',$row['date']);
           $concerts[] = new Concert($row['id'], $row['nom'], $row['description'], $row['adresse'], $date, $row['affiche'],$row['tarif']) ;
        } 
        return $concerts;
    }
    public function getAllConcertArchive(){
        $sql = "SELECT * FROM arth_concerts WHERE date <= now();";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $concerts = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $date = DateTime::createFromFormat('Y-m-d H:i:s',$row['date']);
           $concerts[] = new Concert($row['id'], $row['nom'], $row['description'], $row['adresse'], $date, $row['affiche'],$row['tarif']) ;
        } 
        return $concerts;
    }
    public function getNextConcert(){
        $sql = "SELECT * FROM arth_concerts WHERE date >= now() ORDER BY date ASC;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $date = DateTime::createFromFormat('Y-m-d H:i:s',$row['date']);
        $concert = new Concert($row['id'], $row['nom'], $row['description'], $row['adresse'], $date, $row['affiche'],$row['tarif']) ;
        return $concert;
    }
    public function getConcertById($id){
        $sql = "SELECT * FROM arth_concerts WHERE id = :id;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $date = DateTime::createFromFormat('Y-m-d H:i:s',$row['date']);
        $concert[] = new Concert($row['id'], $row['nom'], $row['description'], $row['adresse'], $date, $row['affiche'],$row['tarif']) ;
        return $concert;
    }
    public function getAllImages(){
        $sql = "SELECT * FROM arth_photos;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $images = array('background'=>array(),'photos'=>array());
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           if($row['background']==1){
               $images['background'][] = new Background($row['id'], $row['chemin'], $row['parent_id']);
           }else{
               $images['photos'][] = new Photo($row['id'], $row['chemin'], $row['description']);
           }
           
        } 
        return $images;
    }
    public function getAllPhotos(){
        $sql = "SELECT * FROM arth_photos WHERE background = 0;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $photos=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $photos[] = new Photo($row['id'], $row['chemin'], $row['description']);
        } 
        return $photos;
    }
    public function getAllBackgrounds(){
        $sql = "SELECT * FROM arth_photos WHERE background = 1;";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $backgrounds=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $backgrounds[] = new Background($row['id'], $row['chemin'], $row['parent_id']);
        } 
        return $backgrounds;
    }
    public function getRecrutement(){
         $sql = "SELECT * FROM arth_alertes WHERE titre = 'recrutement'; ";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $dateEnr = DateTime::createFromFormat('Y-m-d H:i:s',$row['date_enregistrement']);
        $detail = unserialize($row['detail']);
        $recrutement = new Alerte($row['id'], $row['titre'], $row['contenu'],$detail , $dateEnr, $row['urgence']) ;
        return $recrutement;
    }
    public function updateRecrutement(Alerte $recrutement){
        $sql = "UPDATE arth_alertes SET contenu = :contenu, detail = :detail,urgence = :urgence WHERE titre = 'recrutement'; ";
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute(array('contenu' => $recrutement->getContenu(), 'detail' => $recrutement->getDetail(), 'urgence' => $recrutement->getUrgence()));
    }
    public function checkLoginPassword($login, $mdp) {
        $sql = 'SELECT count(*) as count, nom, mdp, id, niveau FROM arth_autorisations WHERE nom=:login AND mdp =:mdp;';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array('login' => $login, 'mdp' => sha1($mdp)));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] == '1') {
            $user = new User($result['id'], $result['nom'], $result['mdp'], $result['niveau']);
        } else {
            $user = FALSE;
        }
        return $user;
    }

}
?>
