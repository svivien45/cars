<?php

require_once("cars.php");
ini_set('memory_limit', '560M');

$fileName = "car-db.csv";
$csvData = getCsvData($fileName);

if(empty($csvData)){
    echo "Nincs adat";
    return false;
}

$makers = getMakers($csvData);

print_r($makers);

$mysqli = new mysqli("localhost","root","","cars");
?>