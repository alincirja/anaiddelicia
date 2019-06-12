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
        $sql = "SELECT * FROM " . $table . " ORDER BY id DESC";
        $array = array();
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function getDataById($table, $id) {
        $sql = "SELECT * FROM " . $table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query && $query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }

    public function getForeignData($table, $field) {
        $sql = "SELECT * FROM " . $table . " WHERE id='" . $field . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }

    public function getCustomData($sql) {
        $array = array();
        $query = mysqli_query($this->connect, $sql);

        if ($query && $query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;
            }
        }
        return $array;
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
        if ($query) {
            $this->sendUserMsg("success", "Inregistrarea a fost adaugata.");
            exit();
        } else {
            $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
            exit();
        }
    }

    /**
     * ACTION - DELETE BY ID
     */

     public function deleteById($table, $id) {
        $sql = "DELETE FROM " . $table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);
        if ($query) {
            $this->sendUserMsg("success", "Inregistrarea a fost stearsa.");
            exit();
        } else {
            $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
            exit();
        }
     }
}
?>