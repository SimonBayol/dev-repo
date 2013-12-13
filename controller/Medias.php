<?php
namespace controller;

use dao\MySqlDao;
use entity\Image ;
use entity\Photo;

class Medias {
    public function photos() {
        $dao = new MysqlDao();
        $photos = $dao->getAllPhotos();
        include VIEW.'photos.php';
    }
    public function videos() {
//        $dao = new MysqlDao();
        
        include VIEW.'videos.php';
    }
}
?>
