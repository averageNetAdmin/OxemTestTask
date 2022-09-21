<?php

function my_autoloader($class) {
    include strtolower($class) . ".php";
}
 
spl_autoload_register("my_autoloader");

class Farm {

    private $animals = array(), $products = array();
    private $lastAnimalId;

    // add one animal to farm
    function addAnimal($animal_type) {
        if (gettype($animal_type) == "string") {
            $this->animals[] = new $animal_type(++$this->lastAnimalId);
        } else if ($animal_type instanceof Animal) {
            $this->animals[] = $animal_type;
        } else {
            echo "invalid animal or animal type " . $animal_type . " \n";
        }
        
    }

    // shortcut to add several animals
    function addAnimals($animal_type, int $number = 1) {
        for ($i = 0; $i < $number; ++$i) {
            $this->addAnimal($animal_type);
        }
    }

    // shortcut to collection products one time in day
    // warning: don't collect in day of start, but collect in last day
    function simulateDays(int $number) {
        for ($i = 0; $i < $number; ++$i) {
            $this->collectProducts();
        }
    }

    // print info about numbers of everyone type of animal
    function printAnimalsInfo() {
        $animalsNumbers = array();
        foreach($this->animals as $animal) {
            $type = $animal->getClassName();
            if (!array_key_exists($type, $animalsNumbers)) {
                $animalsNumbers[$type] = 0;
            }
            $animalsNumbers[$type]++;
        }
        echo "On farm ";
        foreach($animalsNumbers as $animalType => $number) {
            echo $number . " " . $animalType . ", ";
        }
        echo "\n";
    }

    // collect products from all animals in farm
    function collectProducts() {
    
        foreach($this->animals as $animal) {
            $this->products[] = $animal->getProduct();
        }
    }

    // print all collected products on farm
    function countNumberOfCollectedProducts(): array {   
        $productsTypes = array();
        foreach($this->products as $product) {
            $type = $product->getUnit();
            if (!array_key_exists($type, $productsTypes)) {
                $productsTypes[$type] = 0;
            }
            $productsTypes[$type] += $product->getAmount();
        }
        return $productsTypes;
    }

}

?>