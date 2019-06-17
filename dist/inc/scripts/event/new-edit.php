<?php
if (isset($_POST["action"])) {
    include_once "../../../classes/Database.php";
    $action = new Database();
    $emptyVals = array();
    $fields = array(
        "name" => mysqli_real_escape_string($action->connect, $_POST["name"]),
        "date_from" => mysqli_real_escape_string($action->connect, $_POST["date_from"]),
        "time_from" => mysqli_real_escape_string($action->connect, $_POST["time_from"]),
        "date_to" => mysqli_real_escape_string($action->connect, $_POST["date_to"]),
        "time_to" => mysqli_real_escape_string($action->connect, $_POST["time_to"]),
        "signup_open" => mysqli_real_escape_string($action->connect, $_POST["signup_open"]),
        "enabled" => isset($_POST["enabled"]) ? 1 : 0,
        "details" => mysqli_real_escape_string($action->connect, $_POST["details"]),
    );

    foreach ($fields as $key => $val) {
        if (($key !== "enabled" && $key !== "signup_open") && empty($val)) {
            array_push($emptyVals, $key);
        }
    }
    if (!count($emptyVals)) {
        if ($_POST["action"] === "newEvent") {
            $action->insertData("events", $fields);
        } elseif ($_POST["action"] === "editEvent") {
            $action->updateEntry("events", $_POST["eventId"], $fields);
        }
    } else {
        $action->sendUserMsg("danger", "Completari campurile obligatorii", $emptyVals);
    }
}