<?php

abstract class Animal {

    protected $id;

    abstract function getClassName();

    function __construct(int $id) {
        $this->id = $id;
    }

    abstract public function getProduct(): Product;

}

?>