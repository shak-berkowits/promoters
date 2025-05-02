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
</style>
<?php
include_once("./include/code/promoters-dashboard.php");
if (isset($encryption_id)) {
?>
	<section id="integrations-4" class="pt-100 mt-5 integrations-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="section-title mb-70">
						<!-- Title -->
						<h2 class="h2-xl">Welcome to Dashboard</h2>
						<!-- Text -->
						<!-- <p class="p-xl">Ligula risus auctor tempus magna feugiat lacinia fusce blandit</p> -->
					</div>
				</div>
			</div>
			<!-- INTEGRATIONS-4 WRAPPER -->
			<div class="int-4-wrapper">
				<div class="row row-cols-2 row-cols-sm-4 row-cols-md-4">


					<!-- INTEGRATION TOOL #1 -->
					<div class="col">
						<a class="promoter-mob" href="#">
							<div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
								<img class="img-fluid" src="<?= ASSET_DIR_PATH ?>total-lead.jpg" alt="tool-logo">
								<!-- <h5>Total Leads <br> <?= $total_leads ?></h5> -->
								<h5 style="font-size: 17px; font-weight: normal; color: #666;">Total Leads <br> 
									<span style="font-size: 37px; font-weight: bold; color: #000;"><?= $total_leads ?>+</span>
								</h5>
							</div>
						</a>
					</div> <!-- END INTEGRATION TOOL #1 -->


					<!-- INTEGRATION TOOL #2 -->
					<div class="col">
						<a class="promoter-mob" href="#">
							<div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
								<img class="img-fluid" src="<?= ASSET_DIR_PATH ?>verified-lead.jpg" alt="tool-logo">
								<h5 style="font-size: 17px; font-weight: normal; color: #666;">Verified Leads <br> 
									<span style="font-size: 37px; font-weight: bold; color: #000;"><?= $verified_leads ?>+</span>
								</h5>
							</div>
						</a>
					</div> <!-- END INTEGRATION TOOL #2 -->


					<!-- INTEGRATION TOOL #3 -->
					<div class="col">
						<a class="promoter-mob" href="#">
							<div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
								<img class="img-fluid" src="<?= ASSET_DIR_PATH ?>unverified-lead.jpg" alt="tool-logo">
								<h5 style="font-size: 17px; font-weight: normal; color: #666;">Unverified Leads <br> 
									<span style="font-size: 37px; font-weight: bold; color: #000;"><?= $unverified_leads ?>+</span>
								</h5>
							</div>
						</a>
					</div> <!-- END INTEGRATION TOOL #3 -->


					<!-- INTEGRATION TOOL #4 -->
					<div class="col">
						<a class="promoter-mob" href="#">
							<div class="int_tool-4 r-12 wow animate__animated animate__fadeInUp">
								<img class="img-fluid" src="<?= ASSET_DIR_PATH ?>hot-lead.jpg" alt="tool-logo">
								<h5 style="font-size: 17px; font-weight: normal; color: #666;">Hot Leads<br> 
									<span style="font-size: 37px; font-weight: bold; color: #000;"><?= $hot_leads ?>+</span>
								</h5>
							</div>
						</a>
					</div> <!-- END INTEGRATION TOOL #4 -->

				</div>
			</div>
		</div>
	</section>
	<div class="col-md-12 mt-40" style="text-align: center;">
		<button type="submit" href="#" data-bs-toggle="modal" data-bs-target="#modal-2" class="btn r-06 btn--theme hover--theme submit w-25 mob-btn" style="background-color: #7DD1B8;"><img src="<?= ASSET_DIR_PATH ?>plus.jpg" alt="Icon" style="width:22px; height:22px; vertical-align:middle; margin-right:5px;">Add Lead</button>
	</div>
	<!-- Filter Input (Aligned Left) -->

<?php
} else {
	echo "<script>window.location.href = '" . BASE_URL . "';</script>";
	exit;
}
?>