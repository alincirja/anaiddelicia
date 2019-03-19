<?php
include "../../../classes/Category.php";
if (isset($_POST["action"]) && $_POST["action"] === "deleteCategory") {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $category = new Category();
        $category->delete($_GET["id"]);
    } else {
        header("Location: ../../../404");
    }
} else {
    header("Location: ../../../404");
}