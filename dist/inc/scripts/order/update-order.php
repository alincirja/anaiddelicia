<?php
include "../../../classes/Order.php";

if (isset($_POST["action"]) && $_POST["action"] === "updateOrder") {
    $order = new Order();
    $fields = array(
        "comments" => $_POST["comments"],
        "status" => $_POST["status"]
    );
    if($order->updateEntry("orders", $_POST["orderID"], $fields)) {
        $order->sendUserMsg("success", "Comanda a fost actualizata");
    } 
} else {
    echo "Eroare: Not set";
}
?>