<?php
namespace entity;

class Image {
    protected $id;
    protected $url;
    
    function __construct($id, $url) {
        $this->id = $id;
        $this->url = $url;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getId() {
        return $this->id;
    }

    public function getUrl() {
        return $this->url;
    }



    
}

?>
