<?php
if (isset($_GET["session"]) && $_GET["session"] == "end") {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../../");
    exit();
} else {
    header("Location: ../../../");
    exit();
}