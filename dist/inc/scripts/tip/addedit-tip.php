<?php
session_start();
include "../../../classes/CookingTip.php";

if (isset($_POST["action"])) {
    $tips = new CookingTip();

    $info["title"] = mysqli_real_escape_string($tips->connect, $_POST["tipTitle"]);
    $info["body"] = mysqli_real_escape_string($tips->connect, $_POST["tipBody"]);
    $info["id_user"] =  $_SESSION["id"];
    $info["action"] = mysqli_real_escape_string($tips->connect, $_POST["action"]);
    $info["tipId"] = isset($_POST["id"]) ? mysqli_real_escape_string($tips->connect, $_POST["id"]) : 0;

    //print_r($info);
    $tips->addEditTip($info);
} else {
    header("Location: ../../../404");
}
?>