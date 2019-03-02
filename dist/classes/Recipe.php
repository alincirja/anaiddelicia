<?php
include "Database.php";

class Recipe extends Database {
    private $table = "recipes";
    private $tableImages = "images";

    /**
     * GET RECIPE BY PROVIDED ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }

    /**
     * GET RECIPE GALLERY
     */
    public function getGallery($id) {
        $sql = "SELECT * FROM " . $this->tableImages . " WHERE id_recipe='" . $id . "'";
        $array = array();
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;
            }
            
        }

        return $array;
    }

    /**
     * ADD RECIPE IN DATABASE + PRESENTATION IMAGE
     */
    public function addRecipe($info) {
        $requiredVals = array(
            "recipeTitle"           => $info["title"],
            "recipeDescription"     => $info["description"],
            "recipeDirections"      => $info["directions"],
            "recipeCategory"        => $info["id_category"],
            "recipeIngredients"     => $info["ingredients"],
            "recipeCookingTime"     => $info["cooking_time"],
            "recipeComplexity"      => $info["complexity"],
            "recipeServingsNo"      => $info["servings_no"]
        );

        $emptyVal = array();
        foreach ($requiredVals as $required => $required_val) {
            if (empty($required_val)) {
                $emptyVal[] = $required;
            }
        }

        if (count($emptyVal) > 0) {
            $this->sendUserMsg("danger", "Completati toate campurile obligatorii", $emptyVal);
            exit();
        } else {
            if ($info["image"]) {
                if ($info["image"]["error"] != 0) {
                    $this->sendUserMsg("danger", "Imaginea selectata nu este valida.");
                    exit();
                } else {
                    $allowed = ["png", "jpg", "jpeg"];
                    $sizeLimit = 2000000;
                    $fileNameAsArray = explode(".", $info["image"]["name"]);
                    $fileExtension = strtolower(end($fileNameAsArray));

                    if (!in_array($fileExtension, $allowed)) {
                        $this->sendUserMsg("danger", "Imaginile de tip '." . $fileExtension . "', nu sunt acceptate. Va rugam folositi imagini de tip: " . implode(", ", $allowed));
                        exit();
                    } else {
                        if ($info["image"]["size"] > $sizeLimit) {
                            $this->sendUserMsg("danger", "Imaginea este mai mare de 2MB");
                            exit();
                        } else {
                            $imageName = uniqid() . preg_replace('/\s/', '', $info["image"]["name"]);
                            $finalDest = "../../../img/upload/recipes/" . $imageName;
                            move_uploaded_file($info["image"]["tmp_name"], $finalDest);
                            $info["image"] = $imageName;
                        }
                    }
                }
            } else {
                $info["image"] = "";
            }

            $sql =
            "INSERT INTO " . $this->table . 
            " (title, description, directions, id_user, id_category, id_region, ingredients, cooking_time, complexity, servings_no, de_post, image, video) VALUES ('"
            . $info["title"] . "','" .
              $info["description"] . "','".
              $info["directions"] . "','".
              $info["id_user"] . "','".
              $info["id_category"] . "','".
              $info["id_region"] . "','".
              $info["ingredients"] . "','".
              $info["cooking_time"] . "','".
              $info["complexity"] . "','".
              $info["servings_no"] . "','".
              $info["de_post"] . "','".
              $info["image"] . "','".
              $info["video"] . "')";
            
            $result = mysqli_query($this->connect, $sql);
            if ($result) {
                $this->sendUserMsg("success", "Reteta a fost adaugata cu succes");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }
}