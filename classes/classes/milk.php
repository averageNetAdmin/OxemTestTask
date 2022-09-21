<?php

require_once "product.php";

class Milk extends Product {

    function getClassName(): string {
        return __CLASS__;
    }
    
    function getUnit(): string {
        return "litres of milk";
    }
}

?>