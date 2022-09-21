<?php

abstract class Product {

    protected $amount = 0;
    abstract function getClassName();
    // for better output
    abstract public function getUnit(): string;
    function __construct(int $amount) {
        $this->amount = $amount;
    }

    function append(int $amount) {
        $this->amount += $amount;
    }

    function getAmount() {
        return $this->amount;
    }

}

?>