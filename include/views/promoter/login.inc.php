<style>
    .loader {
        display: none; /* Initially hidden */
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 1s linear infinite;
        background-image: none !important;
        /* margin-left: 10px; */
    }

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<div id="login" class="bg--fixed login-3 login-section division">
    <div class="container">
        <div class="row justify-content-center">
            <!-- REGISTER PAGE WRAPPER -->
            <div class="col-lg-11">
                <div class="register-page-wrapper r-16 bg--fixed">
                    <div class="row">
                        <!-- LOGIN PAGE TEXT -->
                        <div class="col-md-6">
                            <div class="register-page-txt color--white">
                                <!-- Logo -->
                                <img class="img-fluid" src="<?= ASSET_IMG_DIR_PATH ?>berkologo.png" alt="logo-image">
                                <!-- Title -->
                                <h3 class="h3-lg">Welcome</h3>
                                <h3 class="h3-lg">back to Berkowits</h3>
                                <!-- Text -->
                                <p class="p-md mt-25">Login access for promoters and secure authentication ensures seamless entry into the dashboard.</p>
                                <!-- Copyright -->
                                <div class="register-page-copyright">
                                    <p class="p-sm">&copy; 2024 Berkowits. <span>All Rights Reserved</span></p>
                                </div>
                            </div>
                        </div> <!-- END LOGIN PAGE TEXT -->
                        <!-- LOGIN FORM -->
                        <div class="col-md-6">
                            <div class="register-page-form">
                                <!-- MOBILE TITLE -->
                                <h5 class="h5-xl rf-m-title">Log in to Berkowits</h5>
                                <!-- FORM -->
                                <form name="signinform" class="row sign-in-form">
                                    <!-- Form Separator -->
                                    <div class="col-md-12 text-center">
                                        <div class="separator-line">Continue with Phone Number</div>
                                    </div>

                                    <!-- Phone Input -->
                                    <div class="col-md-12">
                                        <p class="p-sm input-header">Phone number</p>
                                        <input class="form-control phone" type="text" name="phone" placeholder="9999999999" required>
                                    </div>

                                    <!-- OTP Input (Hidden Initially) -->
                                    <div class="col-md-12 otp-section" style="display: none;">
                                        <p class="p-sm input-header">OTP</p>
                                        <div class="wrap-input">
                                            <input class="form-control otp-input" type="text" name="otp" placeholder="* * * * * * * ">
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn--theme hover--theme submit otp-btn" style="background-color: #7DD1B8;">Send OTP</button>
                                    </div>
                                    <div class="loader"></div>

                                    <input type="hidden" name="promoter_login" value="promoter_login">

                                    <!-- Error Message -->
                                    <div class="col-md-12">
                                        <p id="success-msg" style="color:green; text-align:center;"></p>
                                    </div>

                                    <!-- Error Message -->
                                    <div class="col-md-12">
                                        <p id="error-msg" style="color:red; text-align:center;"></p>
                                    </div>

                                    <!-- Sign Up Link -->
                                    <div class="col-md-12">
                                        <p class="create-account text-center">
                                            Login for admin? <a href="<?= BASE_URL ?>admin/login" class="color--theme">Admin Login</a>
                                        </p>
                                    </div>
                                </form>
                                
                            </div>
                        </div> <!-- END LOGIN FORM -->
                    </div> <!-- End row -->
                </div> <!-- End register-page-wrapper -->
            </div> <!-- END REGISTER PAGE WRAPPER -->
        </div> <!-- End row -->
    </div> <!-- End container -->
</div>

<script>
$(document).ready(function() {
    $(".otp-btn").click(function() {
        let buttonText = $(this).text();

        if (buttonText === "Send OTP") {
            let phone = $(".phone").val();

            if (phone.length !== 10 || isNaN(phone)) {
                $("#error-msg").text("Please enter a valid 10-digit phone number.");
                return;
            }
            $(".loader").show();
            $(".otp-btn").hide();
            $.post("<?= BASE_URL ?>include/code/login-form.php", { action: "send_otp", phone: phone }, function(response) {
                if (response === "otp_sent") {
                    $(".loader").hide();
                    $(".otp-btn").show();
                    $(".otp-section").show();
                    $(".otp-btn").text("Verify OTP");
                    $(".phone").prop("disabled", true);
                    $("#success-msg").text("OTP send your mobile number.");
                    $("#error-msg").text("");
                } else if (response === "not_registered") {
                    $("#error-msg").text("Phone number not registered.");
                    $(".loader").hide();
                    $(".otp-btn").show();
                } else {
                    $("#error-msg").text("Failed to send OTP. Try again.");
                    $(".loader").hide();
                    $(".otp-btn").show();
                }
            });
        } else if (buttonText === "Verify OTP") {
            let otp = $(".otp-input").val();

            if (otp === "") {
                $("#error-msg").text("Please enter the OTP.");
                return;
            }
            $(".loader").show();
            $.post("<?= BASE_URL ?>include/code/login-form.php", { action: "verify_otp", otp: otp }, function(response) {
                $(".loader").hide();
                if (response === "success") {
                    window.location.href = "<?= BASE_URL ?>promoter/dashboard";
                } else {
                    $("#error-msg").text("Invalid OTP. Try again.");
                }
            });
        }
    });
});

</script>