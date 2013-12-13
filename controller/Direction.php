<?php

namespace controller;

use dao\MySqlDao;
use entity\Article ;

class Direction {

    public function action() {
        $dao = new MysqlDao();
        $article = $dao->getArticleByCategory('direction') ;
        include VIEW.'article.php';
    }

}

?>
