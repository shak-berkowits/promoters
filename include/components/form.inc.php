<div  class="container">
			<div class="row d-flex align-items-center">
				<!-- HERO REQUEST FORM -->
				<?php
				if ($detect->isMobile()) {
				?><div style="margin-top: -70px;" class="col-md-6 col-lg-5"><?php
					} else {
						?><div class="col-md-6 col-lg-5"><?php
					}
					?>
						<div id="hero-24-form" class="r-08 block--shadow wow animate__animated animate__fadeInLeft">
							<!-- Title -->
							<h5 class="h5-lg">Book a consultation Now!</h5>
							<!-- Text -->
							<!-- Form -->
							<form action="#" method="post" id="LandingPageForm" name="requestForm" class="row request-form">
								<!-- Form Input -->
								<div class="col-md-12">
									<input type="text" id="fullname" name="fullname" class="form-control name" placeholder="Enter Your Name*" autocomplete="off" required>
								</div>
								<!-- Form Input -->
								<div class="col-md-12">
									<input type="text" maxlength="10" pattern="[6789][0-9]{9}" name="phone" type="text" placeholder="10 digit mobile number" class="form-control phone" autocomplete="off" required>
								</div>
								<!-- Form Input -->
								<div class="col-md-12">
									<input type="email" name="email" class="form-control email" placeholder="Enter Your Email*" autocomplete="off" required>
								</div>
								<!-- Form Select -->
								<div class="col-md-12">
									<?php
									if (isset($_REQUEST['page'])) {
										$sericeName = str_replace('-', ' ', $_REQUEST['page']);
									?>
										<select id="service" name="service" class="form-select" aria-label="Default select example">
											<option value="<?= $sericeName ?>"><?= $sericeName ?></option>
										</select>
									<?php
									} else {
									?>
										<select id="service" name="service" class="form-select" aria-label="Default select example">
											<option Service Not Selected</option>
										</select>
									<?php
									}
									?>
								</div>
								<br /><br />
								<!-- Form Select -->
								<div class="col-md-12">
									<!-- Form Select -->
									<div class="col-md-12 input-subject">
										<select id="centre" name="centre" required="" class="form-select subject" aria-label="Default select example">
											<option value="LocationNotSelected">--Select service location--</option>
											<?php 
											$centre_txt_file = fopen("./include/centre.txt", "r") or die("Unable to open centre file!");
											while(!feof($centre_txt_file)) {
												$centre=fgets($centre_txt_file) ;
												?><option value="<?=$centre?>"><?=$centre?></option><?php
											}
											fclose($centre_txt_file);

											?>

									    </select>
									</div>
								</div>
								<br /><br />
								<input type="hidden" name="submitadviceForm" value="submitadviceForm" />
								<!-- Form Button -->
								<div class="col-md-12 form-btn">
									<button type="submit" class="btn r-06 btn--theme hover--theme submit" onclick="return validateLandingForm()">Submit</button>
								</div>
								<div class="form-check" style="margin-top: 20px;">
									<input name="tickbox" required='required' class="form-check-input" type="checkbox" id="tickbox" checked>
									<span class="checkmark"></span>
									<small class="remember">I agree Terms and Conditions</small><br />
									<small class="form-check-label" style="font-size:13px">I authorize Berkowits Hair and Skin Clinic and its representatives to Call, SMS, Email or Whatsapp me about its products and offers.This consent overrides any registration for DND and NDNC</small>
								</div>
								<!-- Form Message -->
								<div class="col-md-12 request-form-msg text-center">
									<span class="loading"></span>
								</div>
							</form>
							<!-- Notice Text -->
							<!--<small style="font-size: 11px;">By submitting this form, you authorize Berkowits Hair and Skin Clinic and its representatives to Call, SMS, Email or Whatsapp me about its products and offers.This consent overrides any registration for DND and NDNC
										</small> -->
						</div> <!-- END FORM -->
						</div> <!-- END HERO REQUEST FORM -->
						<?php
						if ($detect->isMobile()) {
						?><div class="col-md-6 col-lg-7" style="margin-top: 120px;"><?php
																						} else {
																							?><div class="col-md-6 col-lg-7"><?php
																						}
																	?>
								<!-- HERO TEXT -->
							<div class="hero-24-txt color--white wow animate__animated animate__fadeInRight">
								<!-- Title -->
								<!--<h5>Fix your active rashes, sunburns, rosacea</h5>-->
								<!-- Text -->
								<h1 align="center">Pioneers Since 1988</h1>
								<br>
								<h5  align='center'>Revoltionizing the hair industry with trademarked & patented technologies</h5>
								<hr>
								<!-- <h5> We perform multi-step facial using a specialized device and various serums to cleanse, exfoliate, extract, hydrate, and protect the skin. -->
								<!-- </h5>  -->
								<!-- Users -->
								<div class="">
									<img width="100%" src="<?= ASSET_IMG_DIR_PATH ?>form-side.png" alt="user-avatars">
								</div>
								<div class="">
									<img width="100%" src="<?= ASSET_IMG_DIR_PATH ?>form-side2.png" alt="user-avatars">
								</div>
								<br>
								<div align="center">
								<label> We perform multi-step facial using a specialized device and various serums to cleanse, exfoliate, extract, hydrate, and protect the skin.</label>
								</div>
								<div class="users">
									<img src="images/customer-avatar.png" alt="user-avatars">	
									<p>Trusted by thousands of <span>Customers</span></p>
								</div>
							</div>
						</div>	<!-- END HERO TEXT -->
							</div> <!-- End row -->
					</div> <!-- End container -->