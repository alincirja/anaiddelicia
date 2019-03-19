<?php
include "../../../classes/CookingTip.php";
if (isset($_POST["action"]) && $_POST["action"] === "setStatus") {
    if (isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["status"]) && ($_GET["status"] === "aprobat" || $_GET["status"] === "refuzat")) {
        $tip = new CookingTip();
        $tip->setStatus($_GET["status"], $_GET["id"]);
    } else {
        header("Location: ../../../404");
    }
} else {
    header("Location: ../../../404");
}