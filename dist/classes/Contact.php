<?php
include_once "Database.php";

class Contact extends Database {
    private $table = "contact";

     /**
     * GET CONTACT BY PROVIDED ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    } 
    

    public function addContact($info) {
            if (!empty($info['name']) && !empty($info['subject']) && !empty($info['message']) && !empty($info['phone']) && !empty($info['email'])) {
                $sql= "INSERT INTO " . $this->table . " (name, subject, message, phone, email) VALUES ('" .
                    $info["name"] . "','" .
                    $info["subject"] . "','" .
                    $info["message"] . " ','" .
                    $info["phone"] . " ','" .
                    $info["email"] . " ')";
               
                $result = mysqli_query($this->connect, $sql);
                if ($result) {
                    $this->sendUserMsg("success", "Mesajul a fost trimis cu succes");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                    exit();
                }
            } else {
                $this->sendUserMsg("danger", "Campurile sunt obligatorii");
                exit();
            }
        }
    } 
?>