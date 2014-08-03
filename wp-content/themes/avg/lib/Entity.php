<?php

class Entity { 

    public $name;
    public $facts;
  
    function __construct($name) {
        $this->name = $name;
        $this->facts = array();
    }
    
    function add_fact($fact) {
        $this->facts[] = $fact;
    }
}

?>