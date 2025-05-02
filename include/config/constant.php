<?php 

define("PRODUCTION_BASE_URL","https://berkowits.com/promoters/");
define("MIRROR_PRODUCTION_BASE_URL","https://berkowits.com/");
//define("BASE_URL",MIRROR_PRODUCTION_BASE_URL);
define("PRODUCTION_APP_BASE_URL","https://app.berkowits.com/");
define("AI_ANALYSIS",BASE_URL."ai-analysis/");
define("COMPANY","Berkowits");
define("PRODUCT_NAME","Berkowits Hair & Skin Clinic");
define("ASSET_IMG_DIR_PATH",BASE_URL."assets/images/");
define("ASSET_DIR_PATH",BASE_URL."assets/");
// Ecommerce base URL Mirror or production
define("ECOM_HOME_URL",MIRROR_PRODUCTION_BASE_URL."store/");
define("ECOM_API_BASE_URL",ECOM_HOME_URL."api/");
// Ecommerce base URL END
define("APP_BASE_URL",PRODUCTION_APP_BASE_URL."cma/");
define("CMA_APP_URL",PRODUCTION_APP_BASE_URL."cma/");
define("APP_CENTER_SEARCH_URL",APP_BASE_URL."searchcenterall");
define("CONTACT_EMAIL","inquiry@berkowits.in");
define("CONTACT_PHONE","+91 9999 6666 99");
define("ADMIN_ACCESS_CODE","MHYtfcsvjhgyh@17526");
define("CONTACT_ADDRESS","AAA House 64, near Modi Mill, Okhla Phase III, Okhla Industrial Estate");
// Send data to Altius
define("CMA_API_BASE_URL","https://app.berkowits.com/cma/api/");

// Third party integration KEY
define("RAZORPAY_KEY_ID","rzp_test_x6IG7kdEd3xq23");
define("RAZORPAY_SECRET_KEY","yILvR0J4PVkQFsxr9Z1tsffC");
define("TELEPHANT_API_URL_SEND_MGS","https://api.tellephant.com/v1/send-message");
define("TELEPHANT_API_KEY","two8pLmerfG3FJBleGYe0GdO1htwZ3EHxytPKyLoCR9LM49sfNBywGLpHC85");

// Page titile description & keywords configuration
if(isset($_REQUEST['page'])){
    $pagename=$_REQUEST['page'];
    $pagetoload="./include/views/".$pagename.".inc.php";
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
    else
    $link = "http";
    $link .= "://";
    $link .= $_SERVER['HTTP_HOST']; 
    $link .= $_SERVER['REQUEST_URI'];
    $actual_link = $link;
    $stringSearch=BASE_URL."products/";
    $stringSearch2=BASE_URL."blogs/";
    $stringSearch3=BASE_URL."collections/";
    if(stristr($actual_link, $stringSearch) == TRUE OR stristr($actual_link, $stringSearch2) == TRUE OR stristr($actual_link, $stringSearch3) == TRUE) {
    }else{
        if(!file_exists($pagetoload)){
            $path="Location:"." ".BASE_URL;
            header($path); 
            exit;
        }
    }

    $pagearray = explode("/", $_REQUEST['page'] ?? '');
    if (empty($pagearray[1])) {
        $page = "NA";
    } else {
        $page = str_replace("-", " ", $pagearray[1]);
    }

    //$title_treatment=COMPANY." "."Researched Steps For ".ucwords($page);
    $title_treatment="How it works?";
    switch($_REQUEST['page']){
        case 'services':
            $title="Concerns Related to Hair & Skin Services"." - ".COMPANY;
            $keywords="hair and skin clinic, skin care clinic, hair and skin clinic delhi, hair replacement, non surgical hair replacement";
            $desc="Explore advanced hair loss, skin rejuvenation, and laser treatments at Berkowits Clinic. Book a consultation to achieve your beauty goals today!";
        break;
        case 'treatment':
            $title="Transform Your Look with Advanced Treatments"." - ".COMPANY;
            $keywords="skin pigmentation treatments, glowing skin treatments clinic, advanced anti-aging skin care, dark spot removal treatment";
            $desc="Enhance your beauty with Berkowits expert care. From hair therapy to laser treatments, achieve your goals with our advanced solutions!";
        break;
        default:
            $title="Berkowits Hair & Skin Clinics"." - ".COMPANY;
            $keywords="hair and skin clinic, skin care clinic, hair and skin clinic delhi, hair replacement, non surgical hair replacement";
            $desc="";
        break;
    
    }

}else{
    $title="Berkowits Hair & Skin Clinic | India's #1 AI-Enabled Clinic";
    $keyowrds="hair and skin clinic, skin care clinic, hair and skin clinic delhi, hair replacement, non surgical hair replacement";
    $desc="Berkowits Hair & Skin Clinic  – 15L+ people successful treatments. Get expert hair transplant & skincare solutions, or enjoy free delivery of top products.";
}
?>