<?php
include "../../../classes/Recipe.php";
if (isset($_POST["action"]) && $_POST["action"] === "setStatus") {
    if (isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["status"]) && ($_GET["status"] === "aprobat" || $_GET["status"] === "refuzat")) {
        $recipe = new Recipe();
        $recipe->setStatus($_GET["status"], $_GET["id"]);
    } else {
        print_r($_POST);
        print_r($_GET);
    }
} else {
    header("Location: ../../../404");
}