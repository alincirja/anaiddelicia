<?php
include "../../../../classes/Gallery.php";
if (isset($_POST["action"]) && $_POST["action"] === "addImage") {
    if ($_FILES["galleryFile"]) {
        $image = new Gallery();
        $image->insertImage($_FILES["galleryFile"], $_POST["idRecipe"]);
    }
} else {
    header("Location: ../../../../404");
}