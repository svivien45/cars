<?php
use Exception;
class CarDBtools {
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
}
?>