<?php
/**
 * CONEXIUNE BAZA DE DATE
 */
class Database {
    public $connect;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "socialrecipe";

    function __construct() {
        $this->dbConnect();
    }

    public function dbConnect() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function executeQuery($query) {
        return mysqli_query($this->connect, $query);
    }
}
?>