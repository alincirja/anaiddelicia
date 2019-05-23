<?php
session_start();
include "../../../classes/Order.php";

if (isset($_POST["action"]) && $_POST["action"] === "placeOrder") {
    $order = new Order();

    $info["eventType"] = mysqli_real_escape_string($order->connect, $_POST["eventType"]);
    $info["eventDate"] = mysqli_real_escape_string($order->connect, $_POST["eventDate"]);
    $info["servingsNo"] = mysqli_real_escape_string($order->connect, $_POST["servingsNo"]);
    $info["contactPerson"] = mysqli_real_escape_string($order->connect, $_POST["contactPerson"]);
    $info["phone"] = mysqli_real_escape_string($order->connect, $_POST["phoneNumber"]);
    $info["locationName"] = mysqli_real_escape_string($order->connect, $_POST["locationName"]);
    $info["locationAddress"] = mysqli_real_escape_string($order->connect, $_POST["locationAddress"]);
    $info["details"] = mysqli_real_escape_string($order->connect, $_POST["otherDetails"]);
    $info["appetizerStandard"] = mysqli_real_escape_string($order->connect, $_POST["appetizerStandard"]);
    $info["appetizerCustom"] = mysqli_real_escape_string($order->connect, $_POST["appetizerPreferential"]);
    $info["firstTypeSteak"] = mysqli_real_escape_string($order->connect, $_POST["steak"]);
    $info["firstTypeSideDish"] = mysqli_real_escape_string($order->connect, $_POST["sideDish"]);
    $info["firstTypeSalad"] = mysqli_real_escape_string($order->connect, $_POST["salad"]);
    $info["secondType"] = mysqli_real_escape_string($order->connect, $_POST["dish"]);
    $info["desert"] = mysqli_real_escape_string($order->connect, $_POST["desert"]);
    
    $order->addNew($info);
} else {
    echo "Eroare: Not set";
}
?>
