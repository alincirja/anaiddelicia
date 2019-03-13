<?php
include_once "Database.php";

class Gallery extends Database {
    private $table = "images";

    /**
     * INSERARE IMAGINE
     */
    public function insertImage($image, $id_recipe) {
        if ($image) {
            if ($image["error"] != 0) {
                $this->sendUserMsg("danger", "Imaginea selectata nu este valida.");
                exit();
            } else {
                $allowed = ["png", "jpg", "jpeg"];
                $sizeLimit = 2000000;
                $fileNameAsArray = explode(".", $image["name"]);
                $fileExtension = strtolower(end($fileNameAsArray));

                if (!in_array($fileExtension, $allowed)) {
                    $this->sendUserMsg("danger", "Imaginile de tip '." . $fileExtension . "', nu sunt acceptate. Va rugam folositi imagini de tip: " . implode(", ", $allowed));
                    exit();
                } else {
                    if ($image["size"] > $sizeLimit) {
                        $this->sendUserMsg("danger", "Imaginea este mai mare de 2MB");
                        exit();
                    } else {
                        $imageName = uniqid() . preg_replace('/\s/', '', $image["name"]);
                        $finalDest = "../../../../img/upload/recipes/" . $imageName;
                        move_uploaded_file($image["tmp_name"], $finalDest);
                        $image = $imageName;

                        $sql = "INSERT INTO " . $this->table . " (name, id_recipe) VALUES ('" . $image . "', '" . $id_recipe . "')";
                        $query = mysqli_query($this->connect, $sql);
                        if ($query) {
                            $this->sendUserMsg("success", "Imaginea a fost adaugata cu succes");
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
}