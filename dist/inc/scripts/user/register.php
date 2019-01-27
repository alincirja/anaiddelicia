<?php
include "../../../classes/User.php";

if (isset($_POST["action"]) && $_POST["action"] == "userRegister") {
    $user = new User();

    $info["name"] = mysqli_real_escape_string($user->connect, $_POST["registerName"]);
    $info["email"] = mysqli_real_escape_string($user->connect, $_POST["registerEmail"]);
    $info["password"] = mysqli_real_escape_string($user->connect, $_POST["registerPass"]);

    $user->register($info);
} else {
    header("Location: ../../../");
    exit();
}
?>