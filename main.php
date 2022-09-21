<?php
require_once "classes/farm.php";

$farm = new Farm();
$farm->addAnimals('Cow', 10);
$farm->addAnimals('Chiken', 20);
$farm->printAnimalsInfo();
$farm->simulateDays(7);
$collected = $farm->countNumberOfCollectedProducts();
echo "Collected: ";
foreach ($collected as $productType => $amount) {
    echo $amount . " of " . $productType . ", ";
}
echo "\n";

$farm->addAnimals('Cow');
$farm->addAnimals('Chiken', 5);
$farm->printAnimalsInfo();
$farm->simulateDays(7);
$collected = $farm->countNumberOfCollectedProducts();
echo "Collected: ";
foreach ($collected as $productType => $amount) {
    echo $amount . " of " . $productType . ", ";
}
echo "\n";

?>