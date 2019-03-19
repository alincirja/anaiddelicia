<?php
session_start();
include "../../../classes/CookingTip.php";

if (isset($_POST["action"]) && ($_POST["action"] == "addTip")) {
    $tips = new CookingTip();

    $info["title"] = mysqli_real_escape_string($tips->connect, $_POST["tipTitle"]);
    $info["body"] = mysqli_real_escape_string($tips->connect, $_POST["tipBody"]);
    $info["id_user"] =  $_SESSION["id"];

    $tips->add($info);
} else {
    header("Location: ../../../404");
}
?>