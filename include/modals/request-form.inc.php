<?php
    include_once(__DIR__ . "/../config/config.php");
    include_once(__DIR__ . "/../config/constant.php");
    include_once(__DIR__ . "/../functioins.php");
    $query = "SELECT id, name FROM promoters_campaign";
    $result = mysqli_query($conn, $query);
?>
<style>
    .mdl_form_lbl {
        font-weight: 600;
        color: black;
        font-size: smaller !important;
    }

    .mdl_input {
        font-size: smaller !important;
    }

    #modal-2 .request-form .btn {
        display: block;
        width: 36% !important;
        height: 57px !important;
        margin: 0;
        font-size: smaller;
    }

    @media (max-width: 480px) {

        /* For very small devices */
        #modal-2 .request-form .btn {
            display: block;
            width: 36% !important;
            height: 50px !important;
            margin: 0;
            font-size: smaller;
        }

        #verifyOtpBtn {
            background-color: green !important;
        }
    }

    #verifyOtpBtn {
        background-color: green !important;
    }
</style>


<!-- MODAL WINDOW (REQUEST FORM)============================================= -->
<div id="modal-2" class="modal auto-off fade" tabindex="-1" role="dialog" aria-labelledby="modal-2">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <!-- CLOSE BUTTON -->
            <button type="button" class="btn-close ico-10 color--white" data-bs-dismiss="modal" aria-label="Close">
                <span class="flaticon-cancel"></span>
            </button>
            <!-- MODAL CONTENT -->
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <!-- REQUEST FORM -->
                        <div class="col-md-12">
                            <div class="modal-body-content">
                                <!-- TEXT -->
                                <div class="request-form-title mb-2">
                                    <h5 class="h5-lg">Lead Form</h5>
                                </div>
                                <!-- FORM -->
                                <form name="requestForm" action="<?= BASE_URL ?>include/code/lead-form.php" method="POST" class="row request-form mt-4" id="requestForm" enctype="multipart/form-data">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">First Name</label>
                                        <input type="text" name="first_name" class="form-control mdl_input" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Last Name</label>
                                        <input type="text" name="last_name" class="form-control mdl_input" required>
                                    </div>
                                    <!-- Mobile Number -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Mobile Number</label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control mdl_input" required>
                                    </div>

                                    <!-- Alternate Number (Optional) -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Alternate Number (Optional)</label>
                                        <input type="text" name="alternate_number" class="form-control mdl_input">
                                    </div>
                                    <!-- Concern Type -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Concern Type</label>
                                        <select name="concern_type" class="form-control form-select mdl_input" required>
                                            <option value="" disabled selected>Select Concern Type</option>
                                            <option value="hair">Hair</option>
                                            <option value="skin">Skin</option>
                                            <option value="both">Both</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">City</label>
                                        <input type="text" name="city" class="form-control mdl_input" required>
                                    </div>
                                    
                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Your Gender</label>
                                        <select name="gender" class="form-control form-select mdl_input" required>
                                            <option value="" disabled selected>Select your gender</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Select Campaign</label>
                                        <select name="campaign_id" class="form-control form-select mdl_input" required>
                                            <option value="" disabled selected>Select a Campaign</option>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <!-- Preferred Time for Contact -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Preferred Time for Contact</label>
                                        <input type="time" name="preferred_time" class="form-control mdl_input" required>
                                    </div>

                                    <!-- Additional Comments (Optional) -->
                                    <div class="col-md-6">
                                        <label class="mdl_form_lbl">Additional Comments (Optional)</label>
                                        <textarea name="additional_comments" class="form-control mdl_input" rows="3"></textarea>
                                    </div>
                                    <!-- OTP Input (Hidden initially, shown when "Verify" is checked) -->
                                    <div class="col-md-12 d-none" id="otpSection">
                                        <label class="mdl_form_lbl">Enter OTP</label>
                                        <input type="text" name="otp" id="otpInput" class="form-control mdl_input">
                                    </div>

                                    <!-- Checkboxes at Bottom -->
                                    <div class="col-md-12 m-2 mt-4">
                                        <input type="checkbox" id="verifyCheckbox" name="verify" value="verify">
                                        <label for="verifyCheckbox" class="mdl_form_lbl">Verify Number</label>

                                        <input type="checkbox" id="nonVerifyCheckbox" name="non_verify" value="non_verify" class="ms-3">
                                        <label for="nonVerifyCheckbox" class="mdl_form_lbl">Not Verify number</label>

                                        <input type="checkbox" id="interested_lead" name="interested_lead" class="ms-3">
                                        <label for="interested_lead" class="mdl_form_lbl">Hot Lead</label>
                                    </div>



                                    <!-- Buttons -->
                                    <div class="col-md-12 form-btn d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-secondary color--black r-100" style="border: 2px solid black;">
                                            <a class="text-white" href="<?= BASE_URL ?>">Back</a>
                                        </button>
                                        <button type="submit" name="submit" class="btn btn--theme hover--theme r-100" style="background-color: #7DD1B8;">Submit</button>
                                    </div>
                                    <input type="hidden" name="promoter_id" value="1    ">
                                    <input type="hidden" name="lead_modal_form" value="vlc_modal_form">
                                    <!-- Form Message -->
                                    <div class="col-md-12 request-form-msg">
                                        <span class="loading"></span>
                                    </div>
                                </form>
                                <!-- END FORM -->
                            </div>
                        </div>
                        <!-- END REQUEST FORM -->
                    </div>
                </div>
            </div>
            <!-- END MODAL CONTENT -->
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const verifyCheckbox = document.getElementById("verifyCheckbox");
        const nonVerifyCheckbox = document.getElementById("nonVerifyCheckbox");
        const otpSection = document.getElementById("otpSection");

        verifyCheckbox.addEventListener("change", function() {
            if (this.checked) {
                otpSection.classList.remove("d-none");
                nonVerifyCheckbox.checked = false; // Uncheck Non-Verify

                // Send OTP API call
                sendOtp();
            } else {
                otpSection.classList.add("d-none");
            }
        });

        nonVerifyCheckbox.addEventListener("change", function() {
            if (this.checked) {
                otpSection.classList.add("d-none");
                verifyCheckbox.checked = false; // Uncheck Verify
            }
        });

        function sendOtp() {
            const phone = document.getElementById("mobile_number").value;
            const requestFrom = "PromoterLeadForm";

            if (!phone) {
                alert("Please enter a phone number.");
                otpSection.classList.add("d-none");
                verifyCheckbox.checked = false;
                exit;
            }
            const APP_BASE_URL = "<?php echo APP_BASE_URL; ?>";
            fetch(`${APP_BASE_URL}api/send_voucher`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        phone: phone,
                        request_from: requestFrom
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("OTP sent successfully!");
                    } else {
                        alert("Failed to send OTP. Please try again.");
                        verifyCheckbox.checked = false;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred. Please try again.");
                    verifyCheckbox.checked = false;
                });
        }
    });
</script>