<?php
    session_start();
    include_once(__DIR__ . "/../config/config.php");
    include_once(__DIR__ . "/../config/constant.php"); 
    session_destroy(); 
    header("Location: " . BASE_URL); 
    exit;
?>
