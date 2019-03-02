<?php
/**
 * CONEXIUNE BAZA DE DATE
 */
class Database {
    public $connect;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "anaiddelicia";

    function __construct() {
        $this->dbConnect();
    }

    public function dbConnect() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function executeQuery($query) {
        return mysqli_query($this->connect, $query);
    }

    public function sendUserMsg($type, $msg, $fields = []) {
        $message = new \stdClass();
        $message->type = $type;
        $message->msg = $msg;
        if (count($fields) > 0) {
            $message->fields = $fields;
        }
        $jsonMessage = json_encode($message);
        echo $jsonMessage;
    }

    /**
     * ACTION - READ
     */
    public function getData($table) {
        $sql = "SELECT * FROM " . $table;
        $array = array();
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;
            }
            return $array;
        } else {
            echo "Nu exista date salvate";
        }
    }

    public function getDataById($table, $id) {
        $sql = "SELECT * FROM " . $table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }
    
    /**
     * ACTION - CREATE
     */
    public function insertData($table, $fields) {
        $sql = "";
        $sql .= "INSERT INTO " . $table;
        $sql .= " (" . implode(",", array_keys($fields)) . ") VALUES ";
        $sql .= "('" . implode("','", array_values($fields)) . "')";
        $query = mysqli_query($this->connect, $sql);
        return $query ? true : false;
    }
}
?>