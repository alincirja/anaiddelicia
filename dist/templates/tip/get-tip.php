<?php
    if (isset($_GET["action"]) && $_GET["action"] === "getTip") {
        include_once "../../classes/Database.php";
        $action = new Database();

        if (isset($_GET["id"]) && (int)$_GET["id"] > 0) {
            $tip = $action->getDataById("cooking_tips", $_GET["id"]);
            if ($tip) {
                $action->sendUserMsg($tip["title"], $tip["body"]);
            } else {
                echo "No tip found";
            }
        } else {
            echo "No ID set";
        }
    } else {
        echo "No action set";
    }
?>