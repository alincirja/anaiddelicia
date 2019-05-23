<?php
include_once "Database.php";

class CookingTip extends Database {
    private $table = "cooking_tips";

     /**
     * GET TIPS BY PROVIDED ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }        

    public function addeditTip($info) {
        if ($info["action"] === "editTip" && $info["tipId"] != 0) {
            $sql = "UPDATE " . $this->table . 
            " SET title='" . $info["title"] . 
                    "', body='" . $info["body"] . 
                    "', id_user='" . $info["id_user"] . 
                    "', status='asteptare' WHERE id=" . $info["tipId"];
                    $result = mysqli_query($this->connect, $sql);
                    if ($result) {
                        $this->sendUserMsg("success", "Sfatul culnar  a fost actualizat cu succes");
                        exit();
                    } else {
                        $this->sendUserMsg("danger", "Eroare BD " . mysqli_error($this->connect));
                        exit();
                }
         } else {
            if (!empty($info['title']) && !empty($info['body']) && !empty($info['id_user'])) {
                $sql= "INSERT INTO " . $this->table . " (title, body, id_user) VALUES ('" .
                    $info["title"] . "','" .
                    $info["body"] . "','" .
                    $info["id_user"] . "')";
               
                $result = mysqli_query($this->connect, $sql);
                if ($result) {
                    $this->sendUserMsg("success", "Sfatul culinar a fost adaugata cu succes");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                    exit();
                }
            } else {
                $this->sendUserMsg("danger", "Campurile sunt obligatorii", $info);
                exit();
            }
        }
    }     
}
?>