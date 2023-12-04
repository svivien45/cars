<?php

require_once("cars.php");
require_once("db-tools.php");
require_once("carDBtools.php");
ini_set('memory_limit', '560M');

$fileName = "car-db.csv";
$csvData = getCsvData($fileName);

if(empty($csvData)){
    echo "Nincs adat";
    return false;
}
/*
$mysqli = new mysqli("localhost", "root", null,"cars");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
*/
$CarDBtools = new CarDBtools();
echo "connected\n";

$makers = getMakers($csvData);

$mysqli->query("TRUNCATE TABLE makers");

$errors = [];
foreach ($makers as $maker){
    //$mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
    $result = $carDBtools->createMaker($maker);
    if (!$result){
        $errors[] = $maker;
    }
    echo "$maker\n";
}


//$result = $mysqli->query("SELECT COUNT(id) as cnt FROM makers;");
//$row = $result->fetch_assoc();

$allMakers = $carDBtools->getAllMakers($mysqli);
$cnt = count($allMakers);
echo "$cnt sor van;\n";


$result = insertMakers($mysqli, $makers, true);

$mysqli->close();

?>