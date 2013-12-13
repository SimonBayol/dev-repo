<?php

namespace controller;

use dao\MySqlDao;
use entity\Concert ;

class Concerts {

    public function a_venir() {
        $dao = new MysqlDao();
        $concerts = $dao->getAllConcertAVenir() ;
        include VIEW.'concert.php';
    }
    public function archive() {
        $dao = new MysqlDao();
        $concerts = $dao->getAllConcertArchive() ;
        include VIEW.'archivesconcert.php';
    }
    public function alerteNextConcert(){
        $dao = new MysqlDao();
        $nextConcert = $dao->getNextConcert() ;
        include VIEW.'objetconcert.php';
    }
    public function consultation(){
        $id=$_GET['id'];
        $dao = new MysqlDao();
        $concerts = $dao->getConcertById($id) ;
        include VIEW.'detailconcert.php';
    }

}

?>
