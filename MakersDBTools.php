<?php
class MakersDBTools {
    const DBTABLE = 'makers';
    private $mysqli;

    function __construct($host = 'localhost', $user = 'root', $password = null, $db = 'cars') {
        $this->mysqli = new mysqli($host, $user, $password, $db);
        if ($this->mysqli->connect_error) {
            throw new Exception($this->mysqli->connect_errno);
        }
    }
    function __destruct() {
        $this->mysqli->close();
    }

    function createMaker($maker)
    {
        $result = $this->mysqli->query("INSERT INTO {self:.DBTABLE} (name) VALUES ('$maker')");
        if (!$result) {
            echo "hiba történt a $maker beszúrása közben";
            return $result;
        }
    
        return $result;
    }   

    function getAllMakers(){
        $result = $this->mysqli->query("SELECT * FROM {self:.DBTABLE}");
        $maker = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
    
        return $maker;
    }
}
?>