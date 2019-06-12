<?php
if (isset($_POST["action"]) && $_POST["action"] === "voteRecipe") {
    session_start();
    include_once "../../../classes/Database.php";
    $action = new Database();
    $emptyVals = array();
    $voteInfo = array(
        "id_event"          => mysqli_real_escape_string($action->connect, $_POST["event"]),
        "id_participant"    => mysqli_real_escape_string($action->connect, $_POST["participant"]),
        "id_recipe"          => mysqli_real_escape_string($action->connect, $_POST["recipe"]),
        "id_voter"          => mysqli_real_escape_string($action->connect, $_SESSION["id"])
    );

    foreach ($voteInfo as $key => $val) {
        if (empty($val) || (int)$val < 1) {
            array_push($emptyVals, $key);
        }
    }

    if (count($emptyVals)) {
        $action->sendUserMsg("danger", "Valori nule: " . implode(", ", $emptyVals));
    } else {
        $action->insertData("event_votes", $voteInfo);
    }
}