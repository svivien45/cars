<?php

require_once("cars.php");
ini_set('memory_limit', '560M');

$fileName = "car-db.csv";
$csvData = getCsvData($fileName);

if(empty($csvData)){
    echo "Nincs adat";
    return false;
}
$header = $csvData[0];
$keyMaker = array_search('make', $header);
$keyModel = array_search('model', $header);

$result = [];

    $maker = "";
    $model = "";
    foreach ($csvData as $idx => $line) {
        if ($idx == 0){
            continue;
        }

        if ($maker != $line[$keyMaker]){
            $maker = $line[$keyMaker];
        }
        if ($model != $line[$keyModel]){
            $model = $line[$keyModel];
            $result[$maker][] = $model;
        }
    }
    print_r($result);



?>