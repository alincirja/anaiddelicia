<?php
include "../../../classes/Recipe.php";
if (isset($_POST["action"]) && $_POST["action"] === "changeStatus") {
    if (isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["status"]) && ($_GET["status"] === "aprobat" || $_GET["status"] === "refuzat")) {
        $recipe = new Recipe();
        $recipe->changeStatus($_GET["status"], $_GET["id"]);
    }
} else {
    header("Location: ../../../404");
}