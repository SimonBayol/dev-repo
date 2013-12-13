<?php

namespace controller;

use dao\MySqlDao;
use entity\Article ;

class Biographie {

    public function action() {
        $dao = new MysqlDao();
        $article = $dao->getArticleByCategory('biographie') ;
        include VIEW.'article.php';
    }

}

?>
