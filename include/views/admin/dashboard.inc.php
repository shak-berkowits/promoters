<style>
    @media (max-width: 768px) {

        .mob-btn {
            width: 50% !important;
            /* Full width on mobile */
        }
    }

    .promoter-mob {
        text-decoration: none !important;
        color: black !important;
    }

    .btn-reset {
        all: unset;
        /* Removes all default button styling */
        width: 100%;
        /* Ensures it takes up the full width of the parent */
        display: block;
        /* Makes sure it behaves like a div */
        cursor: pointer;
        /* So it still looks clickable */
    }
</style>
<?php

include_once("./include/code/admin-dashboard.php");
if (isset($_COOKIE['admin_auth']) && $_COOKIE['admin_auth'] == "1") {
?>

?>
    <section id="integrations-4" class="pt-100 mt-5 integrations-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="section-title mb-70">
                        <!-- Title -->
                        <h2 class="h2-xl">Welcome to Admin Dashboard</h2>
                        <!-- Text -->
                        <!-- <p class="p-xl">Ligula risus auctor tempus magna feugiat lacinia fusce blandit</p> -->
                    </div>
                </div>
            </div>
            <!-- INTEGRATIONS-4 WRAPPER -->
            <div class="int-4-wrapper">
                <div class="row row-cols-2 row-cols-sm-5 row-cols-md-5">
                    <!-- Total Leads -->
                    <div class="col">
                        <form action="<?= BASE_URL ?>admin/lead" method="POST">
                            <input type="hidden" name="filter" value="all">
                            <button type="submit" class="promoter-mob btn-reset">
                                <div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
                                    <img class="img-fluid" src="<?= ASSET_DIR_PATH ?>total-lead.jpg" alt="tool-logo">
                                    <h5 style="font-size: 17px; font-weight: normal; color: #666;">Total Leads <br>
                                        <span style="font-size: 37px; font-weight: bold; color: #000;"><?= $total_leads ?>+</span>
                                    </h5>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- Verified Leads -->
                    <div class="col">
                        <form action="<?= BASE_URL ?>admin/lead" method="POST">
                            <input type="hidden" name="filter" value="verified">
                            <button type="submit" class="promoter-mob btn-reset">
                                <div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
                                    <img class="img-fluid" src="<?= ASSET_DIR_PATH ?>verified-lead.jpg" alt="tool-logo">
                                    <h5 style="font-size: 17px; font-weight: normal; color: #666;">Verified Leads <br>
                                        <span style="font-size: 37px; font-weight: bold; color: #000;"><?= $verified_leads ?>+</span>
                                    </h5>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- Unverified Leads -->
                    <div class="col">
                        <form action="<?= BASE_URL ?>admin/lead" method="POST">
                            <input type="hidden" name="filter" value="unverified">
                            <button type="submit" class="promoter-mob btn-reset">
                                <div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
                                    <img class="img-fluid" src="<?= ASSET_DIR_PATH ?>unverified-lead.jpg" alt="tool-logo">
                                    <h5 style="font-size: 17px; font-weight: normal; color: #666;">Unverified Leads <br>
                                        <span style="font-size: 37px; font-weight: bold; color: #000;"><?= $unverified_leads ?>+</span>
                                    </h5>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- Hot Leads -->
                    <div class="col">
                        <form action="<?= BASE_URL ?>admin/lead" method="POST">
                            <input type="hidden" name="filter" value="hot">
                            <button type="submit" class="promoter-mob btn-reset">
                                <div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
                                    <img class="img-fluid" src="<?= ASSET_DIR_PATH ?>hot-lead.jpg" alt="tool-logo">
                                    <h5 style="font-size: 17px; font-weight: normal; color: #666;">Hot Leads<br>
                                        <span style="font-size: 37px; font-weight: bold; color: #000;"><?= $hot_leads ?>+</span>
                                    </h5>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- Promoters Leads -->
                    <div class="col">
                        <a href="<?= BASE_URL ?>admin/promoter" class="promoter-mob btn-reset">
                            <div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
                                <img class="img-fluid" src="<?= ASSET_DIR_PATH ?>total-promoter.jpg" alt="tool-logo">
                                <h5 style="font-size: 17px; font-weight: normal; color: #666;">Total promoter<br>
                                    <span style="font-size: 37px; font-weight: bold; color: #000;"><?= $total_promoter ?>+</span>
                                </h5>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- <div class="col-md-12 mt-40" style="text-align: center;">
		<button type="submit" href="#" data-bs-toggle="modal" data-bs-target="#modal-2" class="btn r-06 btn--theme hover--theme submit w-25 mob-btn" style="background-color: #7DD1B8;"><img src="<?= ASSET_DIR_PATH ?>plus.jpg" alt="Icon" style="width:22px; height:22px; vertical-align:middle; margin-right:5px;">Add Lead</button>
	</div> -->
    <!-- Filter Input (Aligned Left) -->

<?php
} else {
    echo "<script>window.location.href = '" . BASE_URL . "admin/login';</script>";
    exit;
}
?>