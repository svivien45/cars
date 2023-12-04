<?php
function createMaker($mysqli, $maker)
{
    $result = $mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
    if (!$result) {
        echo "hiba történt a $maker beszúrása közben";
        return $result;
    }
    
    return $result;
}

function updateMaker($mysqli, $data) {
    $result = $mysqli->query("UPDATE makers SET maker name = {$data['name']}");
    if (!$result) {
        echo "hiba történt a {$data['name']} beszúrása közben";
        return $result;    
    }

    $maker = getMakerByName($mysqli, $data['name']);
    return $maker;
}

function getMaker($mysqli, $id){
    $result = $mysqli->query("SELECT  * FROM makers WHERE id=$id");
    $maker = $result->fetch_assoc();

    return $maker;
}

function getMakerByName($mysqli, $name){
    $result = $mysqli->query("SELECT * FROM makers WHERE name=$name");
    $maker = $result->fetch_assoc();
    $result->free_result();

    return $maker;
}

function deleteMaker($mysqli, $id){
    $result = $mysqli->query("DELETE makers WHERE id=$id");
    
    return $result;
}

function getAllMakers($mysqli){
    $result = $mysqli->query("SELECT * FROM makers");
    $maker = $result->fetch_assoc(MYSQL_ASSOC);
    $result->free_result();

    return $maker;
}
?>