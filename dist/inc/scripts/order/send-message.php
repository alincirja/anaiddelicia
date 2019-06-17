<?php
    session_start();
    if (isset($_POST["action"]) && $_POST["action"] === "sendMsg") {
        include "../../../classes/Database.php";
        $action = new Database();
        $fields = array(
            "id_order" => mysqli_real_escape_string($action->connect, $_POST["orderId"]),
            "id_user" => $_SESSION["id"],
            "message" => mysqli_real_escape_string($action->connect, $_POST["msg"])
        );
        $action->insertData("order_messages", $fields);
    } else {
        echo "Nu aveti permisiune";
    }
?>