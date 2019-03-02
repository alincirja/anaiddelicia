<?php
include "../../../classes/User.php";

if (isset($_POST["action"]) && $_POST["action"] == "updateProfile") {
    $user = new User();
    $info["id"] = mysqli_real_escape_string($user->connect, $_POST["userId"]);
    $info["name"] = mysqli_real_escape_string($user->connect, $_POST["editName"]);
    $info["email"] = mysqli_real_escape_string($user->connect, $_POST["editEmail"]);
    $info["description"] = mysqli_real_escape_string($user->connect, $_POST["editDescription"]);
    $info["facebook"] = mysqli_real_escape_string($user->connect, $_POST["editFacebook"]);
    $info["instagram"] = mysqli_real_escape_string($user->connect, $_POST["editInstagram"]);
    $info["linkedin"] = mysqli_real_escape_string($user->connect, $_POST["editLinkedin"]);
    $info["youtube"] = mysqli_real_escape_string($user->connect, $_POST["editYoutube"]);

    $user->updateInfo($info);
} else {
    header("Location: ../../../");
    exit();
}?>