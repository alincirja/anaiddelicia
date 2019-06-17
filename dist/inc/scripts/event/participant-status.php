<?php
if (isset($_GET["id"], $_GET["status"])) {
    include_once "../../../classes/Database.php";
    $action = new Database();

    $fields = array("approved" => mysqli_real_escape_string($action->connect, $_GET["status"]));
    $action->updateEntry("event_participants", $_GET["id"], $fields);
}