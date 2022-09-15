<?php

require_once "product.php";

class Egg extends Product {

    function getUnit(): string {
        return "eggs";
    }

}

?>