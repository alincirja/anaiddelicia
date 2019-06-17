<?php
if (isset($_POST["action"]) && $_POST["action"] === "updateOrder") {
    include_once "../../../classes/Database.php";
    $action = new Database();

    $order = mysqli_real_escape_string($action->connect, $_POST["orderId"]);
    $orderInfo = array(
        "comments" => mysqli_real_escape_string($action->connect, $_POST["comments"]),
        "status" => mysqli_real_escape_string($action->connect, $_POST["status"]),
    );
    $action->updateEntry("orders", $order, $orderInfo);
}