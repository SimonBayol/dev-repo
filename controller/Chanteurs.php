<?php

namespace controller;

use dao\MySqlDao;
use entity\Chanteur ;

class Chanteurs {

    public function action() {
        $dao = new MysqlDao();
        $chanteurs = $dao->getAllChanteurs() ;
        include VIEW.'chanteurs.php';
    }

}

?>
