<?php

namespace controller;

use dao\MySqlDao;
use entity\Article;
use entity\Alerte;
use entity\Chanteur;
use entity\Chant;
use entity\Production;
use \DateTime;

class BackOffice {

    public function action() {
        $dao = new MysqlDao();
        include BACK_DIR.'back_accueil.php';
    }
    
    public function informations() {
        $name=$_GET['name'];
        if($name == null){
            header('location: /BackOffice');
        }
        $dao = new MysqlDao();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $article = new Article($name, $_POST['titre'], $_POST['contenu'], $_POST['image']);
            $dao->updateArticle($article);
            include BACK_DIR.'back_informations.php';
         }else{
            $article = $dao->getArticleByCategory($name) ;
            $images = $dao->getAllImages();
            include BACK_DIR.'back_informations.php';
         }
    }
     public function delete_chanteur() {
        $id = $_GET['id'];
        $dao = new MysqlDao();
        $dao->deleteChanteurById($id) ;
        header('location:/BackOffice/chanteurs'); 
    }
    public function chanteurs() {
        $dao = new MysqlDao();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_POST['fonction'] == ''){$_POST['fonction'] = 'aucune';}
            $newChanteur = new Chanteur($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['tessiture'], new DateTime(), $_POST['fonction']);
            if($newChanteur->getId()==""){
                $dao->addChanteur($newChanteur);
            }else{
                $dao->updateChanteur($newChanteur);
            }
            header('location:/BackOffice/chanteurs');
         }else{
            $chanteurs = $dao->getAllChanteurs() ;
            include BACK_DIR.'back_chanteurs.php';
         }  
    }
    public function repertoire() {
        $dao = new MysqlDao();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//var_dump($_POST);die();
            if($_POST['id'] == ''){$_POST['id'] = null;}else{$chant_id = $_POST['id'];}
            $newChant = new Chant($_POST['id'], $_POST['titre'], $_POST['compositeur']);
            if($newChant->getId()==null){
                 $chant_id = $dao->addChant($newChant);
            }else{
                 $dao->updateChant($newChant);
            }
            if($_POST['programme'] != 'aucun'){
                $dao->deleteRelationRepProgByIdRep($chant_id);
                foreach ($_POST['programme'] as $prod_id) {
                    $dao->addRelationChantProduction($chant_id, $prod_id);
                }
            }
            header('location:/BackOffice/repertoire');
         }else{
            $repertoire = $dao->getAllChants() ;//TODO modifier ça pour que ça match avec le HABTM des chants / productions... => ici on va faire un array de productions
            $productions = $dao->getAllProductionToArray();
            include BACK_DIR.'back_repertoire.php';
         }  
    }
    public function delete_chant() {
        $id = $_GET['id'];
        $dao = new MysqlDao();
        $dao->deleteChantById($id) ;
        $dao->deleteRelationRepProgByIdRep($id);
        header('location:/BackOffice/repertoire'); 
    }
    public function recrutement() {
        $dao = new MysqlDao();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $detail = array($_POST['soprano'],$_POST['alto'],$_POST['tenor'],$_POST['basse']);
            $detail_serialized = serialize($detail);
            $recrutement = new Alerte(2, 'recrutement', $_POST['contenu'], $detail_serialized, new DateTime(), $_POST['urgence']);
            $dao->updateRecrutement($recrutement);
//            $article = new Article($name, $_POST['titre'], $_POST['contenu'], $_POST['image']);
//            
//            $dao->updateArticle($article);
            include BACK_DIR.'back_recrutement.php';
         }else{
            $recrutement = $dao->getRecrutement() ;
            $detail = $recrutement->getDetail();
            include BACK_DIR.'back_recrutement.php';
         }
        
        
    }
}

?>
