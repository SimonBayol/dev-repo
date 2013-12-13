<?php

namespace controller;

use dao\MySqlDao;
use entity\Chanteur ;

class Repertoire {

    public function action() {
        $dao = new MysqlDao();
        $chants = $dao->getAllChants() ;
        include VIEW.'repertoire.php';
    }
    public function programme() {
        $dao = new MysqlDao();
        $programme = $dao->getAllProgramme() ;
        include VIEW.'programme.php';
    }
    

}

?>
