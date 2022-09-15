<?php
require_once "classes/farm.php";

$farm = new Farm();
$farm->addAnimals('Cow', 10);
$farm->addAnimals('Chiken', 20);
$farm->printAnimalsInfo();
$farm->simulateDays(7);
$farm->printNumberOfCollectedProducts();

$farm->addAnimals('Cow');
$farm->addAnimals('Chiken', 5);
$farm->printAnimalsInfo();
$farm->simulateDays(7);
$farm->printNumberOfCollectedProducts();

?>