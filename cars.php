<?php

function getCsvData($cars) { 
    if (!file_exists($cars)) {
        echo "$cars nem található";
        return false;
    }

    $csv = fopen($cars,"r");
    $lines = [];

    while (!feof($csv)) {
        $line = fgetcsv($csv);
        $lines[] = $line;
    }
    fclose($csv);

    return $lines;
    
}

function getMakers($csvData) 
{
    $header = $csvData[0];
    $keyMaker = array_search('make', $header);
    //$keyModel = array_search('model', $header);

    //$result = [];
    $maker = '';
    $makers = [];
    //$model = '';
    
    foreach ($csvData as $idx => $line) 
    {
        if (!is_array($line)){
            continue;
        }
        if ($idx == 0){
            continue;
        }

        if ($maker != $line[$keyMaker]){
            $maker = $line[$keyMaker];
            $makers[] = $maker;
        }
    /*    if ($model != $line[$keyModel]){
            $model = $line[$keyModel];
            $result[$maker][] = $model;
    */   
    }

    return $makers;

}

    

    
?>