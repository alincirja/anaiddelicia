<?php
include_once "Database.php";

class Category extends Database {
    private $table = "categories";

    /**
     * CATEGORII : ADD NEW
     */
    public function addNew($name) {
        if (empty($name)) {
            $this->sendUserMsg("danger", "Numele este obligatoriu");
            exit();
        } else {
            // check for existing name
            $checkExist = mysqli_query($this->connect, "SELECT * FROM " . $this->table . " WHERE name='" . $name . "'");
            if ($checkExist->num_rows > 0) {
                $this->sendUserMsg("danger", "Categoria '" . $name . "' deja exista.");
                exit();
            } else {
                $query = mysqli_query($this->connect, "INSERT INTO " . $this->table . " (name) VALUES ('". $name ."')");
                if ($query) {
                    $this->sendUserMsg("success", "Categoria '" . $name . "' a fost adaugata cu succes");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                    exit();
                }
            }
        }
    }

    public function updateName($name, $id) {
        if (empty($name)) {
            $this->sendUserMsg("danger", "Numele este obligatoriu");
            exit();
        } else {
            $query = mysqli_query($this->connect, "UPDATE " . $this->table . " SET name='" . $name . "' WHERE id='" . $id . "'");
            if ($query) {
                $this->sendUserMsg("success", "Categoria a fost actualizata cu succes");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }

    public function delete($id) {
        if (empty($id)) {
            $this->sendUserMsg("danger", "Stergerea nu este posibila");
            exit();
        } else {
            $query = mysqli_query($this->connect, "DELETE FROM " . $this->table . " WHERE id='" . $id . "'");
            if ($query) {
                $this->sendUserMsg("success", "Categoria a fost stearsa");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }
}