<?php
$number = $_SESSION['phone'];
$name = $_SESSION['name'];
?>
<!-- HEADER
            ============================================= -->
<header id="header" class="tra-menu navbar-dark white-scroll">
    <div class="header-wrapper" style="background-color: #E0E0E0;">
        <!-- MOBILE HEADER -->
        <div class="wsmobileheader clearfix">
            <span class="smllogo">
                <a href="#"><img src="<?= ASSET_DIR_PATH ?>berkowits-logo.jpg" alt="mobile-logo"></a>
            </span>
            <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        </div>
        <!-- NAVIGATION MENU --> <!-- hi -->
        <div class="wsmainfull menu clearfix">
            <div class="wsmainwp clearfix">
                <!-- HEADER BLACK LOGO -->
                <div class="desktoplogo">
                    <a href="#" class="logo-black"><img src="<?= ASSET_DIR_PATH ?>/berkowits-logo.jpg" alt="logo"></a>
                </div>
                <!-- HEADER WHITE LOGO -->
                <div class="desktoplogo">
                    <a href="#" class="logo-white"><img src="<?= ASSET_DIR_PATH ?>/berkowits-logo.jpg" alt="logo"></a>
                </div>
                <!-- MAIN MENU -->
                <nav class="wsmenu clearfix">
                    <ul class="wsmenu-list nav-theme">
                        <!-- Existing menu items here -->
                        <!-- <li class="mt-3 nl-simple" aria-haspopup="true"> -->
                        <!-- <form action="#" method="get" class="d-flex" role="search"> -->
                        <!-- <input name="query" style="width: 400px;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <!-- </form> -->
                        <!-- </li> -->
                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="#" class="h-link">Welcome <?= $name;  ?></a>
                        </li>
                        <!-- <li class="nl-simple" aria-haspopup="true">
                                        <a href="<?= BASE_URL ?>treatment" class="h-link">Logout</a>
                                    </li> -->
                        <!-- <li class="nl-simple" aria-haspopup="true">
                                        <a target="_blank" href="<?= ECOM_HOME_URL ?>" class="h-link">Product</a>
                                    </li>
                                    <li class="nl-simple" aria-haspopup="true">
                                        <a href="<?= APP_CENTER_SEARCH_URL ?>" class="h-link">Center</a>
                                    </li> -->
                        <!-- <li class="nl-simple" aria-haspopup="true">
                                        <a href="<?= BASE_URL ?>about-us" class="h-link">About Us</a>
                                    </li> -->
                        <!-- <li class="nl-simple" aria-haspopup="true">
                                        <a href="<?= BASE_URL ?>contact" class="h-link">Contact</a>
                                    </li>
                                    <li class="nl-simple" aria-haspopup="true">
                                        <a target="_blank" href="https://wa.me/919999666699?text=Hello" class="h-link">
                                            <img src="<?= BASE_URL ?>images/Berkowits_icon/whatsapp.png" alt="Icon" style="width:20px; height:20px; vertical-align:middle; margin-right:5px;">
                                        </a>
                                    </li> -->
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