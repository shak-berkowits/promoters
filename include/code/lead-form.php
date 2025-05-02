<?php
session_start();
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../config/constant.php");
include_once(__DIR__ . "/../functioins.php");

if (isset($_REQUEST['lead_modal_form'])) {
    try {
        // ✅ Sanitize input data
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $mobile_number = trim($_POST['mobile_number']);
        $alternate_number = isset($_POST['alternate_number']) ? trim($_POST['alternate_number']) : NULL;
        $concern_type = trim($_POST['concern_type']);
        $city = trim($_POST['city']);
        $preferred_time = trim($_POST['preferred_time']);
        $gender = trim($_POST['gender']);
        $campaign_id = trim($_POST['campaign_id']);
        $additional_comments = isset($_POST['additional_comments']) ? trim($_POST['additional_comments']) : NULL;
        $mobile_verify = isset($_POST['verify']) ? 1 : 0;
        $hot_lead = isset($_POST['interested_lead']) ? 1 : 0;
        $promoter_id = $_SESSION['id'];
        $otp = trim($_POST['otp']);

        $param = array(
            "firstname" => $first_name,
            "lastname" => $last_name,
            "email" => "",
            "phone" => $mobile_number,
            "leadSource" => "Berkowits-Promoters-Form"
        );

        if (!empty($mobile_number) && !empty($otp)) {
            $verifyOtpUrl = APP_BASE_URL . "api/verify_otp";

            // Call the API
            $verifyOtpResponse = sendOtpSms($verifyOtpUrl, array('phone' => $mobile_number, 'otp' => $otp));
            $responseData = json_decode($verifyOtpResponse, true);
            if (isset($responseData['success']) && $responseData['success'] == 1) {
                echo "<script>alert('OTP verification Successfully.');</script>";
            } else {
                echo "<script>alert('OTP verification failed. Please try again.'); window.history.back();</script>";
                exit;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Mobile number and OTP are required.']);
        }

        // ✅ Step 1: Check if promoter_id exists in `promoters_master`
        if ($promoter_id !== NULL) {
            $stmt = $conn->prepare("SELECT id FROM promoters_master WHERE id = ?");
            $stmt->bind_param("i", $promoter_id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows === 0) {
                echo "<script>alert('Invalid Promoter ID. No matching record found!'); window.history.back();</script>";
                exit();
            }
            $stmt->close();
        }

        // ✅ Step 2: Check if mobile number already exists in `promoters_lead`
        $stmt = $conn->prepare("SELECT id FROM promoters_lead WHERE mobile_number = ?");
        $stmt->bind_param("s", $mobile_number);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "<script>alert('This mobile number is already registered!'); window.history.back();</script>";
            exit(); // ✅ Stop execution after showing alert
        }
        $stmt->close();

        date_default_timezone_set('Asia/Kolkata');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        // ✅ Step 3: Insert into `promoters_lead`
        $stmt = $conn->prepare("INSERT INTO promoters_lead 
            (promoter_id, first_name, last_name, mobile_number, alternate_number, mobile_verify, concern_type, gender, campaign_name, prefer_time, additional_comment, hot_lead, status, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, ?)");

        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        $stmt->bind_param("issssisssssiss", $promoter_id, $first_name, $last_name, $mobile_number, $alternate_number, $mobile_verify, $concern_type, $gender, $campaign_id, $preferred_time, $additional_comments, $hot_lead, $created_at, $updated_at);

        if ($stmt->execute()) {
            echo "<script>alert('Lead Form submitted successfully!'); window.location.href='" . BASE_URL . "promoter/dashboard';</script>";
            exit();
        } else {
            throw new Exception("Execution failed: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
        exit();
    } finally {
        // ✅ Always close connection (even if error occurs)
        if (isset($conn)) {
            $conn->close();
        }
    }
}
