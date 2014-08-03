<?php

class Fact { 

    public $unit;
    public $perunit;
    public $quantity;
    public $desc;
  
    function __construct($quantity, $unit, $perunit = false, $desc=false) {
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->perunit = $perunit;
        $this->desc = $desc;
    }
    
    function add_fact($fact) {
        $this->facts[] = $fact;
    }

    function __toString() {
        if($this->desc) {
            return "$" . $this->quantity . " " . $this->desc;
        }   else {
            if($this->perunit) {
                return "$" . $this->quantity . " " . $this->unit . "(s) per " . $this->perunit;
            } else {
                return "$" . $this->quantity . " " . $this->unit . "(s)";
            }
        }
    }
}


class Unit {

    public $name;
    
    function __construct($name) {
        $this->name = $name;
    }

    function __toString() {
        return $this->name;
    }

}

class SmallUnit extends Unit {
    public $price;

    function __construct($name, $price) {
        parent::__construct($name);
        $this->price = $price;
    }
    
    public function toJson() {
        return array("name"=>$this->name, "price"=>$this->price);
    }

}

?>