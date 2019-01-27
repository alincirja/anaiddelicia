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
        //Check for empty fields
        if (empty($info["name"]) || empty($info["email"] || empty($info["password"]))) {
            $this->sendUserMsg("danger", "Completati toate campurile");
            exit();
        } else {
            //Check for valid characters
            if (!preg_match("/^[a-zA-Z]*$/", $info["name"])) {
                $this->sendUserMsg("danger", "Folositi doar litere latine in campul nume");
                exit();
            } else {
                //Check for valid email
                if (!filter_var($info["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->sendUserMsg("danger", "Adresa de email nu este valida");
                    exit();
                } else {
                    //Check for existing email
                    $queryExist = "SELECT * FROM " . $this->table . " WHERE email='" . $info["email"] . "'";
                    $checkExist = mysqli_query($this->connect, $queryExist);
                    if ($checkExist->num_rows > 0) {
                        $this->sendUserMsg("danger", "Adresa de email este deja folosita in sistem");
                        exit();
                    } else {
                        //Hash password
                        $info["hashedPass"] = password_hash($info["password"], PASSWORD_DEFAULT);
                        
                        //Insert user
                        $sql = "INSERT INTO users (name, email, password) VALUES ('" . $info["name"] . "', '" . $info["email"] . "', '" . $info["hashedPass"] . "')";
                        $result = mysqli_query($this->connect, $sql);
                        if ($result) {
                            $this->sendUserMsg("success", "Contul a fost creat.");
                            exit();
                        } else {
                            $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                            exit();
                        }
                    }
                }
            }
        }   
    }

    public function login($login) {
        if (empty($login["email"]) || empty($login["password"])) {
            $this->sendUserMsg("danger", "Ambele campuri sunt obligatorii");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE email='" . $login["email"] . "'";
            $result = mysqli_query($this->connect, $sql);
            if ($result->num_rows < 1) {
                $this->sendUserMsg("danger", "Adresa de email si/sau parola sunt incorecte.");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //De-hasshing password
                    $hashedPassCheck = password_verify($login["password"], $row["password"]);
                    if ($hashedPassCheck == false) {
                        $this->sendUserMsg("danger", "Adresa de email si/sau parola sunt incorecte.");
                        exit();
                    } elseif ($hashedPassCheck == true) {
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["name"] = $row["name"];
                        $_SESSION["register_date"] = $row["register_date"];
                        $_SESSION["rights"] = $row["rights"];

                        $this->sendUserMsg("success", $login["redirect"]);
                        exit();
                    }
                }
            }
        }
    }
}
?>