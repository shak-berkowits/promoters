<?php
session_start();
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../config/constant.php");
include_once(__DIR__ . "/../functioins.php");

if (isset($_REQUEST['submit_campaign'])) {
  if (!empty($_POST['campaign_name'])) {
    $campaign_name = $conn->real_escape_string($_POST['campaign_name']);

    // Insert into compaign table
    // $sql = "INSERT INTO promoters_campaign (name) VALUES ('$campaign_name')";

    date_default_timezone_set('Asia/Kolkata');
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO promoters_campaign (name, created_at, updated_at) 
        VALUES ('$campaign_name', '$created_at', '$updated_at')";


    if ($conn->query($sql) === TRUE) {
      echo "<script>
            alert('Campaign added successfully!');
            history.back(); // Go back to the previous page
          </script>";
    } else {
      echo "<script>
            alert('Error: " . $conn->error . "');
            history.back(); 
          </script>";
    }
  } else {
    echo "<script>
                alert('Campaign Name is required!');
                history.back();
              </script>";
  }
}
