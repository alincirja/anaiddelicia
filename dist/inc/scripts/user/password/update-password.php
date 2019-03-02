<?php
include "../../../../classes/User.php";


if (isset($_POST["action"]) && $_POST["action"] == "updatePassword") {
    $user = new User();

    $id = mysqli_real_escape_string($user->connect, $_POST["userId"]);
    $password = mysqli_real_escape_string($user->connect, $_POST["newPassword"]);
    $confirm = mysqli_real_escape_string($user->connect, $_POST["confirmPassword"]);

    $user->updatePassword($password, $confirm, $id);
}