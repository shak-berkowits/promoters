<?php
$access = $_SESSION['access_token'];
if ($access == ADMIN_ACCESS_CODE ) {
?>
<div id="signup" class="bg--fixed signup-3 login-section division tab-pane">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="register-page-wrapper r-16 bg--fixed">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="register-page-form">
                                <h5 class="h5-xl rf-m-title">Create an Account</h5>
                                <form name="signupform" action="<?= BASE_URL ?>include/code/signup-form.php" class="row sign-up-form" method="POST">
                                    <div class="col-md-6">
                                        <p class="p-sm input-header">First Name</p>
                                        <input class="form-control first_name" type="text" name="first_name" placeholder="John" required>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="p-sm input-header">Last Name</p>
                                        <input class="form-control last_name" type="text" name="last_name" placeholder="Doe" required>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="p-sm input-header">Email Address</p>
                                        <input class="form-control email" type="email" name="email" placeholder="example@example.com" required>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="p-sm input-header">Phone Number</p>
                                        <input class="form-control number" type="tel" name="number" placeholder="9999999999" required>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="p-sm input-header">Address</p>
                                        <input class="form-control address" type="text" name="address" placeholder="Enter your address" required>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn--theme hover--theme submit" style="background-color: #7DD1B8;">
                                            Create Account
                                        </button>
                                    </div>
                                    <input type="hidden" name="signup_form" value="signup_form">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
} else {
	echo "<script>window.location.href = '" . BASE_URL . "admin/login';</script>";
	exit;
}
?>