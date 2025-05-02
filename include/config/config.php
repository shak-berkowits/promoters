<?php 
// Select Environment
$env="production";
//$env="localhost";
switch ($env){
    case 'production':
        define("BASE_URL","https://berkowits.com/promoters/");
        define("DB_SERVER_NAME", "127.0.0.1");
        define("DB_USER_NAME", "berkowits-cma-admin-2");
        define("DB_PASS", "Berkowits@cma@admin@2");
        define("DB_NAME", "berkowits-cma-backend");

        // Create connection
        $conn = new mysqli(DB_SERVER_NAME, DB_USER_NAME, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }         
    break;
    case 'localhost':
        define("BASE_URL","http://localhost/promoters/");
        // define("BASE_URL","http://172.16.0.55/promoters/");
        define("DB_SERVER_NAME", "localhost");
        define("DB_USER_NAME", "root");
        define("DB_PASS", "");
        define("DB_NAME", "test");

        // Create connection
        $conn = new mysqli(DB_SERVER_NAME, DB_USER_NAME, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    break;
    default:
        define("BASE_URL","https://berkowits.com/");
    break;


}









?>