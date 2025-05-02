<?php
session_start();
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../config/constant.php");

if (isset($_REQUEST['signup_form'])) {
    try {


        // Retrieve and sanitize input
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $phone = trim($_POST['number']);
        $email = trim($_POST['email']);
        $address = trim($_POST['address']);

        // Validate required fields
        if (empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($address)) {
            throw new Exception("All fields are required!");
        }

        // Check if phone number OR email already exists
        $stmt_check = $conn->prepare("SELECT id FROM promoters_master WHERE phone = ? OR email = ?");
        if (!$stmt_check) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt_check->bind_param("ss", $phone, $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            throw new Exception("This phone number or email is already registered.");
        }
        $stmt_check->close();

        // Encrypt the phone number (you can change this encryption method if needed)
        $encryption_id = base64_encode($phone);
        $full_name = $first_name . ' ' . $last_name;

        date_default_timezone_set('Asia/Kolkata');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO promoters_master (encryption_id, name, phone, email, address, created_at, updated_at) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("sssssss", $encryption_id, $full_name, $phone, $email, $address, $created_at, $updated_at);

        if (!$stmt->execute()) {
            throw new Exception("Something went wrong. Please try again later.");
        }

        // If everything is successful
        echo "<script>
                alert('Promoter Add Successful!');
                window.location.href = '" . BASE_URL . "admin/dashboard';
              </script>";

        $stmt->close();
        exit();
    } catch (Exception $e) {
        // Display error message in alert and redirect back
        echo "<script>
                alert('" . $e->getMessage() . "');
                window.history.back();
              </script>";
        exit();
    }
}



// if(isset($_REQUEST['signup_form'])){
//   $first_name = trim($_POST['first_name']);
//   $last_name = trim($_POST['last_name']);
//   $phone = trim($_POST['number']);
//   $email = trim($_POST['email']);
//   $address = trim($_POST['address']);

//   // Validate required fields
//   if (empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($address)) {
//     echo "<script>
//             alert('All fields are required!');
//             window.history.back();
//         </script>";
//     exit;
//   }


//   // Check if phone number OR email already exists
//   $stmt_check = $conn->prepare("SELECT id FROM promoters WHERE phone = ? OR email = ?");
//   if (!$stmt_check) {
//     die("Database error: " . $conn->error);
//   }

//   $stmt_check->bind_param("ss", $phone, $email);
//   $stmt_check->execute();
//   $stmt_check->store_result();

//   if ($stmt_check->num_rows > 0) {
//     echo "<script>
//             alert('This phone number or email is already registered.');
//             window.history.back();
//           </script>";
//     exit;
//   }
//   $stmt_check->close();

//   // Encrypt the ID (Example: base64 encoding, change as per need)
//   $encryption_id = base64_encode($phone);

//   // Prepare SQL query
//   $stmt = $conn->prepare("INSERT INTO promoters (encryption_id, name, phone, email, address, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
//   $full_name = $first_name . ' ' . $last_name;
//   $stmt->bind_param("sssss", $encryption_id, $full_name, $phone, $email, $address);

//   if ($stmt->execute()) {

//     echo "<script>
//                 alert('Registration Successful! You will be redirected to login.');
//                 window.location.href = '" . BASE_URL . "login';
//              </script>";
//   } else {
//     echo "<script>
//                 alert('Some thing went wrong.');
//                 window.history.back();
//              </script>";
//   }

//   $stmt->close();
// }
