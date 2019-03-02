<?php
include "../../../../classes/User.php";


if (isset($_POST["action"]) && $_POST["action"] == "checkPassword") {
    $user = new User();
    $password = mysqli_real_escape_string($user->connect, $_POST["currentPassword"]);
    $id = mysqli_real_escape_string($user->connect, $_POST["userId"]);

    $user->checkPassword($password, $id);
} else {
    header("Location: ../../../../");
    exit();
}?>