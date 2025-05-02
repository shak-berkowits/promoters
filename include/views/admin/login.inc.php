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
                                <p class="p-md mt-25">Login access for admin and secure authentication ensures seamless entry into the dashboard.</p>
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
                                <h5 class="h5-xl rf-m-title">Log in to Berkowits Admin</h5>
                                <!-- FORM -->
                                <form name="loginform" method="POST" class="row sign-in-form">
                                    <!-- Form Separator -->
                                    <div class="col-md-12 text-center">
                                        <div class="separator-line">Continue with Access code</div>
                                    </div>

                                    <!-- Phone Input -->
                                    <div class="col-md-12">
                                        <p class="p-sm input-header">Admin access code</p>
                                        <input class="form-control code" type="text" name="code" placeholder="Enter admin access Code" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn--theme hover--theme submit code-btn" style="background-color: #7DD1B8;">Verify Code</button>
                                    </div>

                                    <!-- <div class="loader"></div> -->

                                    <input type="hidden" name="admin_form" value="admin_form">

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
                                            Login for promoter? <a href="<?= BASE_URL ?>promoter/login" class="color--theme">Promoter Login</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $(".code-btn").on("click", function() {
        let code = $("input[name='code']").val().trim();

        if (code === "") {
            $("#error-msg").text("Please enter the access code.");
           return;
        } 
        // $(".loader").show();
        $.ajax({
            url: "<?= BASE_URL ?>include/code/admin-login.php", // Adjust this path based on your project structure
            type: "POST",
            data: { code: code },
            dataType: "json",
            success: function(response) {
                // console.log("AJAX Success:", response); // Debugging line
                // $(".loader").hide();
                if (response.status === "success") {
                    $("#success-msg").text(response.message);
                    setTimeout(() => {
                        window.location.href = "<?= BASE_URL ?>admin/dashboard"; // Adjust BASE_URL if needed
                    }, 1500);
                } else {
                    $("#error-msg").text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", xhr.responseText); // Debugging line
                $("#error-msg").text("Something went wrong. Please try again.");
            }
        });
    });
});

</script>
