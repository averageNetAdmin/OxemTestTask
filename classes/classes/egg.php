<?php

require_once "product.php";

class Egg extends Product {

    function getClassName(): string {
        return __CLASS__;
    }
    
    function getUnit(): string {
        return "eggs";
    }

}

?>