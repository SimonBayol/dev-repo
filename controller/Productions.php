<?php

namespace controller;

use dao\MySqlDao;
use entity\Production ;
use \Exception;

class Productions {

    public function production() {
        $dao = new MysqlDao();
        
        if(isset($_GET['name']) && $_GET['name'] != '' && in_array($_GET['name'], $dao->getAllProduction())){ 
            $name = $_GET['name'];
        }else{
            throw new Exception();
        }
        $production = $dao->getProductionByName($name) ;
        include VIEW.'production.php';
    }
    

}

?>
