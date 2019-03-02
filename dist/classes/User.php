<?php
include "Database.php";

class User extends Database {
    private $table = "users";

    /**
     * GET USER BY PROVIDED ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }

    /**
     * REGISTER NEW USER
     */
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
                        $sql = "INSERT INTO " . $this->table . " (name, email, password) VALUES ('" . $info["name"] . "', '" . $info["email"] . "', '" . $info["hashedPass"] . "')";
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

    /**
     * LOGIN USER
     */
    public function login($login) {
        if (empty($login["email"]) || empty($login["password"])) {
            $this->sendUserMsg("danger", "Ambele campuri sunt obligatorii");
            exit();
        } else {
            $sql = "SELECT * FROM " . $this->table . " WHERE email='" . $login["email"] . "'";
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

    /**
     * UPDATE USER DETAILS
     */
    public function updateInfo($info) {
        if (empty($info["name"]) || empty($info["email"])) {
            $this->sendUserMsg("danger", "Completati campurile oblligatorii");
            exit();
        } else {
            if (!preg_match("/^[a-zA-Z\s]*$/", $info["name"])) {
                $this->sendUserMsg("danger", "Folositi doar litere latine in campul nume");
                exit();
            } else {
                //Check for valid email
                if (!filter_var($info["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->sendUserMsg("danger", "Adresa de email nu este valida");
                    exit();
                } else {
                    $sql = "UPDATE " . $this->table . 
                    " SET name='" . $info["name"] . 
                    "', email='" . $info["email"] . 
                    "', description='" . $info["description"] . 
                    "', social_facebook='" . $info["facebook"] . 
                    "', social_instagram='" . $info["instagram"] . 
                    "', social_linkedin='" . $info["linkedin"] . 
                    "', social_youtube='" . $info["youtube"] . 
                    "' WHERE id=" . $info["id"];
                    $result = mysqli_query($this->connect, $sql);
                    if ($result) {
                        $this->sendUserMsg("success", "Profilul a fost actualizat cu succes");
                        exit();
                    } else {
                        $this->sendUserMsg("danger", "Eroare BD " . mysqli_error($this->connect));
                        exit();
                    }
                }
            }
        }
    }

    /**
     * UPDATE USER PASSWORD
     */
    public function checkPassword($password, $id) {
        if (empty($password)) {
            $this->sendUserMsg("danger", "Completati parola curenta");
            exit();
        } else {
            $sql = "SELECT password FROM " . $this->table . " WHERE id='" . $id . "'";
            $result = mysqli_query($this->connect, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $hashedPassCheck = password_verify($password, $row["password"]);
                if ($hashedPassCheck == true) {
                    $this->sendUserMsg("success", "Parola este corecta");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Parola este incorecta");
                    exit();
                }
            } 
        }

    }

    public function updatePassword($password, $confirm, $id) {
        if (empty($password) || empty($confirm)) {
            $this->sendUserMsg("danger", "Campurile sunt obligatorii");
            exit();
        } else {
            if ($password != $confirm) {
                $this->sendUserMsg("danger", "Parolele nu coincid");
            } else {
                $newPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE " . $this->table .
                " SET password='" . $newPassword . "'";
                $result = mysqli_query($this->connect, $sql);
                if ($result) {
                    $this->sendUserMsg("success", "Parola a fost schimbata cu succes");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Eroare BD " . mysqli_error($this->connect));
                    exit();
                }
            }

        }
    }

    /**
     * UPDATE USER PROFILE PHOTO
     */
    public function updateProfilePhoto($info) {
        // TODO
    }
}
?>