<?php
if (isset($_POST["action"]) && $_POST["action"] === "setStatus") {
    include_once "../../../classes/Database.php";
    $action = new Database();

    $event = mysqli_real_escape_string($action->connect, $_POST["event"]);
    $eventInfo = array(
        "enabled" => mysqli_real_escape_string($action->connect, $_POST["enabled"])
    );
    $action->updateEntry("events", $event, $eventInfo);
}