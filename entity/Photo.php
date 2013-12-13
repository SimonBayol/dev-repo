<?php
namespace entity;

class Photo extends Image{
    private $description;
    
    function __construct($id,$url,$description) {
        parent::__construct($id, $url);
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
}

?>
