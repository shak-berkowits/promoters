<?php
session_start();
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../config/constant.php");
include_once(__DIR__ . "/../functioins.php");

// Define the correct access code


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = trim($_POST["code"]);

    if ($code === ADMIN_ACCESS_CODE) {
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["access_token"] = ADMIN_ACCESS_CODE;
        echo json_encode(["status" => "success", "message" => "Access granted. Redirecting..."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid access code!"]);
    }
}
?>