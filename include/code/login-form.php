<?php
session_start();
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../config/constant.php");
include_once(__DIR__ . "/../functioins.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "send_otp") {
        $phone = $_POST['phone'];
        $query = "SELECT * FROM promoters_master WHERE phone = '$phone'";
        $result = mysqli_query($conn, $query);
        $_SESSION['phone'] = $phone;

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['name'];
            $_SESSION['encryption_id'] = $row['encryption_id'];
            $_SESSION['id'] = $row['id'];

            // If the number is not 7906556998, send the OTP
            if ($phone == "7906556998") {
                echo "otp_sent";
                exit;
            }

            $sendOtpUrl = APP_BASE_URL . 'api/send_otp';
            $requestFrom = 'promoter';
            $sendOtpResponse = sendOtpSms($sendOtpUrl, array('phone' => $phone, 'request_from' => $requestFrom));
            echo "otp_sent";
        } else {
            echo "not_registered";
            exit;
        }
    }

    if ($action == "verify_otp") {
        $otp = $_POST['otp'];
        $num = $_SESSION['phone'];

        // If the number is 7906556998 and OTP is 154549, bypass API and redirect
        if ($num == "7906556998" && $otp == "154549") {
            echo "success"; // Simulating a successful OTP verification
            exit;
        }

        $verifyOtpUrl = APP_BASE_URL . 'api/verify_otp';
        $verifyOtpResponse = sendOtpSms($verifyOtpUrl, array('phone' => $num, 'otp' => $otp));
        $responseData = json_decode($verifyOtpResponse, true);

        if ($responseData && isset($responseData['success']) && $responseData['success'] == 1) {
            setcookie("otp_verified", "1", time() + 86400, "/"); // Cookie valid for 24 hours
            echo "success"; // OTP matched successfully
        } else {
            echo "invalid_otp"; // OTP verification failed
        }
        exit;
    }
}


?>
