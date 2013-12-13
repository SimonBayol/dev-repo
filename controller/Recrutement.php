<?php

namespace controller;

use dao\MySqlDao;
use entity\Alerte ;

class Recrutement {

    public function action() {
        $dao = new MysqlDao();
        $recrutement = $dao->getRecrutement() ;
        include VIEW.'recrutement.php';
    }
    public function alerteRecrutement() {
        $dao = new MysqlDao();
        $recrutement = $dao->getRecrutement() ;
        include VIEW.'objetrecrutement.php';
    }   
    
}

?>
