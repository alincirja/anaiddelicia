<?php
include "../../../classes/Category.php";
if (isset($_POST["action"]) && $_POST["action"] === "editCategory") {
    if (isset($_POST["id"]) && !empty($_POST["id"]) && isset($_POST["name"]) && !empty($_POST["name"])) {
        $category = new Category();
        $category->updateName($_POST["name"], $_POST["id"]);
    } else {
        header("Location: ../../../404");
    }
} else {
    header("Location: ../../../404");
}