<?php
include "Database.php";

class Action extends Database {
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