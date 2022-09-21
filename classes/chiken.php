<?php

require_once "animal.php";

class Chiken extends Animal {

    function getClassName(): string {
        return __CLASS__;
    }
    
    function getProduct(): Egg {
        $eggsNumber = random_int(0, 1);
        $eggs = new Egg($eggsNumber);
        return $eggs;
    }

}

?>