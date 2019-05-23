<?php
session_start();
include "../../../classes/Contact.php";

if (isset($_POST["action"]) && $_POST["action"] === "addContact") {
    $contact = new Contact();

    $info["name"] = mysqli_real_escape_string($contact->connect, $_POST["contactName"]);
    $info["message"] = mysqli_real_escape_string($contact->connect, $_POST["contactMessage"]);
    $info["email"] = mysqli_real_escape_string($contact->connect, $_POST["contactEmail"]);
    $info["phone"] = mysqli_real_escape_string($contact->connect, $_POST["contactPhone"]);
    $info["subject"] = mysqli_real_escape_string($contact->connect, $_POST["contactSubject"]);

    //print_r($info);
    $contact->addContact($info);
} else {
    echo "Eroare: Not set";
}
?>