<?php
if (isset($_POST["action"]) && $_POST["action"] === "eventSignup") {
    include_once "../../../classes/Database.php";
    $action = new Database();
    $fields = array(
        "id_user" => $_POST["id_user"],
        "id_recipe" => $_POST["id_recipe"],
        "id_event" => $_POST["id_event"]
    );
    if (!empty($fields["id_user"]) && !empty($fields["id_recipe"]) && !empty($fields["id_event"])) {
        $action->insertData("event_participants", $fields);
    } else {
        $action->sendUserMsg("danger", "Userul si/sau reteta selectata incorecte");
    }
}