<?php

abstract class Animal {

    protected $id;

    function __construct(int $id) {
        $this->id = $id;
    }

    abstract public function getProduct(): Product;

}

?>