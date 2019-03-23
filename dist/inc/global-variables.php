<?php
// Define URL
define("ROOT_PATH", "/anaiddelicia/dist/");
define("ROOT_URL", "http://localhost/anaiddelicia/dist/");

define("RECIPE_IMAGES", ROOT_PATH . "img/upload/recipes/");
define("USER_IMAGES", ROOT_PATH . "img/upload/profile/");

define("RECIPE_URL_STANDARD", "recipe?type=");
define("RECIPE_URL", array(
    "new" => RECIPE_URL_STANDARD . "new",
    "view" => RECIPE_URL_STANDARD . "view&id=",
    "edit" => RECIPE_URL_STANDARD . "edit&id=",
    "gallery" => RECIPE_URL_STANDARD . "gallery&id="
));

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