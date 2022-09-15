<?php

function my_autoloader($class) {
    include strtolower($class) . ".php";
}
 
spl_autoload_register("my_autoloader");

class Farm {

    public $animals = array(), $products = array(), $currentDay = 0;
    private $lastAnimalId;

    // add one animal to farm
    function addAnimal($animal_type) {
        if (gettype($animal_type) == "string") {
            $this->animals[] = new $animal_type(++$this->lastAnimalId);
        } else if (gettype($animal_type) == "object" && $animal_type instanceof Animal) {
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
            $this->nextDay();
            $this->collectProducts();
        }
    }

    // print info about numbers of everyone type of animal
    function printAnimalsInfo() {
        $animalsNumbers = array();
        foreach($this->animals as $animal) {
            $type = get_class($animal);
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
        echo "Day" . $this->currentDay . "\n";
        foreach($this->animals as $animal) {
            $prod = $animal->getProduct();
            if (!($prod instanceof Product)) {
                echo "invalid product " . $prod . "\n";
                return;
            }
            $type = get_class($prod);
            if (!array_key_exists($type, $this->products)) {
                $this->products[$type] = new $type(0);
            }
            $obj = $this->products[$type];
            $obj->append($prod->getAmount());
        }
    }

    // for better visualization
    function nextDay() {
        $this->currentDay++;
    }

    // print all collected products on farm
    function printNumberOfCollectedProducts() {   
        echo "Collected ";
        foreach($this->products as $product) {
            echo $product->getAmount() . " " . $product->getUnit() . ", ";
        }
        echo "in " . $this->currentDay . " days\n";
    }

}

?>