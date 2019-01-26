<?php
include "Database.php";

class User extends Database {
    private $table = "users";

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }

    public function register($info) {
        /*
        $queryExist = "SELECT * FROM " . $this->table . " WHERE email='" . $info["email"] . "'";
        $checkExist = mysqli_query($this->connect, $queryExist);
        if ($checkExist->num_rows > 0) {
            echo "Adresa de email este deja folosita in sistem";
        } else {
            
        }
        */
        $this->sendUserMsg("success", "Contul a fost creat");
    }

    public function sayHello($name) {
        echo "Hello " . $name;
    }
}
?>