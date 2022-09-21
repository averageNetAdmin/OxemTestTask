<?php

require_once "animal.php";

class Cow extends Animal {

    function getClassName(): string {
        return __CLASS__;
    }
    
    function getProduct(): Milk {
        $litres = random_int(8, 12);
        $milk = new Milk($litres);
        return $milk;
    }

}

?>