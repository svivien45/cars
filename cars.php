<?php

function getCsvData($cars, $withHeader = true) { 
    $cars = "car-db.csv";
    if (!file_exists($cars)) {
        echo "$cars nem található";
        return false;
    }

    $car = fopen($cars,"r");
    $header = fgetcsv($car);
    if ($withHeader) {
        $lines[] = $header;
    }
    else {
        $lines = [];
    }

    while (!feof($car)) {
        $line = fgetcsv($car);
        $lines[] = $line;
    }
    fclose($car);

    return $lines;
    
}
    
?>