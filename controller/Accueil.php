<?php

namespace controller;

use dao\MySqlDao;
use entity\Article ;

class Accueil {

    public function action() {
        $dao = new MysqlDao();
        $article = $dao->getArticleByCategory('accueil') ;
        include VIEW.'article.php';
    }

}

?>
