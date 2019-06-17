<?php
if (isset($_POST["action"]) && $_POST["action"] === "deleteEvent") {
    include_once "../../../classes/Database.php";
    $action = new Database();

    $event = mysqli_real_escape_string($action->connect, $_POST["event"]);
    $action->deleteById("events", $event);
}