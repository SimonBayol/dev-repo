<?php
namespace entity;

class Background extends Image {
    private $refPage;
    
    function __construct($id,$url,$refPage) {
        parent::__construct($id, $url);
        $this->refPage = $refPage;
    }
    
    public function getRefPage() {
        return $this->refPage;
    }
   
}

?>
