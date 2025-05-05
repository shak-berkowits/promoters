<?php
    session_start();
    include_once(__DIR__ . "/../config/config.php");
    include_once(__DIR__ . "/../config/constant.php");
    setcookie("admin_auth", "", time() - 3600, "/");
    session_unset();
    session_destroy(); 
    header("Location: " . BASE_URL); 
    exit;
?>