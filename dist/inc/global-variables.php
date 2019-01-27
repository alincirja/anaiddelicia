<?php
// Define URL
define("ROOT_PATH", "/anaiddelicia/dist/");
define("ROOT_URL", "http://localhost/anaiddelicia/dist/");

// Check logged usser
function loggedIn() {
    if (isset($_SESSION["email"]) && $_SESSION["email"] != "") {
        return true;
    } else {
        return false;
    }
}

// Chec for admin
function isAdmin() {
    if (isset($_SESSION["rights"]) && $_SESSION["rights"] = "admin") {
        return true;
    } else {
        return false;
    }
}