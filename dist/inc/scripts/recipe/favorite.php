<?php
if (isset($_POST["action"])) {
    include_once "../../../classes/Database.php";
    $action = new Database();

    if ($_POST["action"] === "addToFavs") {
        $fields = array(
            "id_user" => $_POST["user"],
            "id_recipe" => $_POST["recipe"]
        );
        $action->insertData("favorite_recipes", $fields);
    } elseif ($_POST["action"] === "removeFav") {
        $favId = $_POST["favId"];
        $action->deleteById("favorite_recipes", $favId);
    } else {
        echo "Informatii neclare.";
    }
} else {
    echo "Forbidden!";
}