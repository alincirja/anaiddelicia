<?php
if (isset($_POST["action"]) && $_POST["action"] === "addCategory") {
    if (isset($_POST["addCategory"])) {
        include_once "../../../classes/Category.php";
        $cat = new Category();
        $cat->addNew($_POST["addCategory"]);
    } else {
        header("Location: ../../../404");
        exit();
    }
} else {
    header("Location: ../../../404");
    exit();
}