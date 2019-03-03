<?php
include "../../../../classes/Database.php";
if (isset($_POST["action"]) && $_POST["action"] === "deleteImage") {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $image = new Database();
        $image->deleteById("images", $_GET["id"]);
    }
} else {
    header("Location: ../../../../404");
}