<?php

namespace controller;

use dao\MySqlDao;
use entity\Alerte ;

class Contacts {

    public function action() {
//        $dao = new MysqlDao();
        
        include VIEW.'contacts.php';
    }

}

?>
