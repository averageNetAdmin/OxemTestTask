<?php

require_once "product.php";

class Milk extends Product {
    function getUnit(): string {
        return "litres of milk";
    }
}

?>