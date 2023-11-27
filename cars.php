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
    
?>