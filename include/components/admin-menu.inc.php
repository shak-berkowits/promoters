			
			<style>

				.modal-body {
					padding: var(--bs-modal-padding) !important;
				}
				/* .modal-header .btn-close {
					background: none !important;
				} */
				
			</style>
			<!-- HEADER
			============================================= -->
			<header id="header" class="tra-menu navbar-dark white-scroll">
				<div class="header-wrapper" style="background-color: #e0e0e0;">
					<!-- MOBILE HEADER -->
					<div class="wsmobileheader clearfix">
						<span class="smllogo">
							<a href="<?= BASE_URL ?>admin/dashboard"><img src="<?= ASSET_DIR_PATH ?>berkowits-logo.jpg" alt="mobile-logo"></a>
						</span>
						<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
					</div>
					<!-- NAVIGATION MENU --> <!-- hi -->
					<div class="wsmainfull menu clearfix">
						<div class="wsmainwp clearfix">
							<!-- HEADER BLACK LOGO -->
							<div class="desktoplogo">
								<a href="<?= BASE_URL ?>admin/dashboard" class="logo-black"><img src="<?= ASSET_DIR_PATH ?>/berkowits-logo.jpg" alt="logo"></a>
							</div>
							<!-- HEADER WHITE LOGO -->
							<div class="desktoplogo">
								<a href="<?= BASE_URL ?>admin/dashboard" class="logo-white"><img src="<?= ASSET_DIR_PATH ?>/berkowits-logo.jpg" alt="logo"></a>
							</div>
							<!-- MAIN MENU -->
							<nav class="wsmenu clearfix">
								<ul class="wsmenu-list nav-theme">
									<!-- SIMPLE NAVIGATION LINK -->
									<li class="nl-simple" aria-haspopup="true">
										<a href="<?= BASE_URL ?>admin/promoter" class="h-link">Promoters</a>
									</li>
									<li class="nl-simple" aria-haspopup="true">
										<a href="<?= BASE_URL ?>admin/lead" class="h-link">Leads</a>
									</li>
									<li class="nl-simple" aria-haspopup="true">
										<a href="<?= BASE_URL ?>admin/campaign" class="h-link">Campaign</a>
									</li>
									<li class="nl-simple" aria-haspopup="true">
										<a href="<?= BASE_URL ?>admin/add-promoter" class="btn r-06 hover--tra-coal last-link" style="border: 1px solid;">Add Promoter</a>
									</li>
									<li class="nl-simple" aria-haspopup="true">
										<a href="#" class="btn r-06 hover--tra-coal last-link" style="border: 1px solid;" data-bs-toggle="modal" data-bs-target="#campaignModal">Add campaign</a>
									</li>
									<li class="nl-simple" aria-haspopup="true">
										<a href="<?= BASE_URL ?>include/code/logout.php" class="btn r-06 hover--tra-coal last-link">
											<img src="<?= ASSET_DIR_PATH ?>log-in.png" alt="Icon" style="width:22px; height:22px; vertical-align:middle; margin-right:5px;">
											Logout
										</a>
									</li>
								</ul>
							</nav>
							<!-- END MAIN MENU -->
						</div>
					</div> <!-- END NAVIGATION MENU -->
				</div> <!-- End header-wrapper -->
			</header> <!-- END HEADER -->
			<!-- Campaign Modal -->
			<div class="modal auto-off fade" id="campaignModal" tabindex="-1" aria-labelledby="campaignModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="campaignModalLabel">Add Campaign</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form id="campaignForm" action="<?= BASE_URL ?>include/code/submit-campaign.php" method="POST">
								<div class="mb-3">
									<label for="campaignName" class="form-label">Campaign Name</label>
									<input type="text" class="form-control" id="campaignName" name="campaign_name" required>
								</div>
								<div class="text-center">
									<button type="submit" class="btn" style="background-color: #7DD1B8;">Add Campaign</button>
								</div>
								<input type="hidden" name="submit_campaign" value="submit_campaign">
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Campaign Table -->
			<script>
				function showTab(tabId) {
					$(".tab-pane").hide(); // Hide all sections
					$("#" + tabId).show(); // Show the selected section

					$(".nav-link").removeClass("active"); // Remove active class from all tabs

					// Correctly add active class to the clicked tab
					$('.wsmenu-list a').removeClass("active"); // Remove active from menu items
					$(".wsmenu-list a[href='#'][onclick=\"showTab('" + tabId + "')\"]").addClass("active");
				}
			</script>