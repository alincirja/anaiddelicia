<?php
if (isset($_POST["action"]) && $_POST["action"] === "addToFavs") {
    include_once "../../../classes/Database.php";
    $action = new Database();

    $fields = array(
        "id_user" => $_POST["user"],
        "id_recipe" => $_POST["recipe"]
    );

    $action->insertData("favorite_recipes", $fields);
}