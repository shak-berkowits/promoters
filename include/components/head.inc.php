<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DSAThemes">
    <meta name="description" content="<?= $desc ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SITE TITLE -->
    <title><?= $title ?></title>
    <!-- dynamic canonical -->
    <?php

    $canonicalURL = BASE_URL;

    if (isset($_REQUEST['page'])) {
        $pagename = $_REQUEST['page'];
        $canonicalURL = BASE_URL  . $pagename;
    } elseif (isset($_REQUEST['adminpage'])) {
        $pagename = $_REQUEST['adminpage'];
        $canonicalURL = BASE_URL . 'admin/' . $pagename;
    } elseif (isset($_REQUEST['promoterpage'])) {
        $pagename = $_REQUEST['promoterpage'];
        $canonicalURL = BASE_URL . 'promoter/' . $pagename;
    } else {
        $canonicalURL = BASE_URL;
    }

    ?>
    <!-- Robots tag end -->
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <!-- <link rel="canonical" href="https://berkowits.com" /> -->
    <link rel="canonical" href="<?= htmlspecialchars($canonicalURL, ENT_QUOTES, 'UTF-8') ?>" />
    <!-- Robots tag end -->
    <!-- twitter card start -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="https://berkowits.com">
    <meta name="twitter:site" content="@BerkowitsClinic">
    <meta name="twitter:title" content="Berkowits Hair and Skin Clinic: Advanced Skin & Hair Treatments">
    <meta name="twitter:url" content="https://berkowits.com">
    <meta name="twitter:description" content="Enhance your natural beauty with Berkowits Hair and Skin Clinic’s non-invasive treatments. Perfect your hair and skin with our expert care and innovation.">
    <meta name="twitter:image" content="https://berkowits.com/cdn/shop/files/berkowits_logo_360x_f172520f-94e1-44c0-b762-cfd54ef2388e_1.webp?v=1678348220&width=300">
    <!-- twitter card end -->
    <!-- OG Tag card end -->
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Berkowits Hair & Skin Clinic">
    <meta property="og:title" content="Berkowits Hair and Skin Clinic: Advanced Skin & Hair Treatments">
    <meta property="og:url" content="https://berkowits.com">
    <meta property="og:description" content="Enhance your natural beauty with Berkowits Hair and Skin Clinic’s non-invasive treatments. Perfect your hair and skin with our expert care and innovation.">
    <meta property="og:image" content="https://berkowits.com/cdn/shop/files/berkowits_logo_360x_f172520f-94e1-44c0-b762-cfd54ef2388e_1.webp?v=1678348220&width=300">
    <meta property="og:image:alt" content="Berkowits logo">
    <meta property="og:type" content="service">
    <!--  OG Tag card end -->
    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png">
    <!-- <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
    <link rel="apple-touch-icon" sizes="152x152" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png">
    <link rel="apple-touch-icon" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png">
    <link rel="icon" href="<?= ASSET_DIR_PATH ?>berkowits-icon.png" type="image/x-icon">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="<?= BASE_URL ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- FONT ICONS -->
    <link href="<?= BASE_URL ?>css/flaticon.css" rel="stylesheet">
    <!-- PLUGINS STYLESHEET -->
    <link href="<?= BASE_URL ?>css/menu.css" rel="stylesheet">
    <link id="effect" href="<?= BASE_URL ?>css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/magnific-popup.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/lunar.css" rel="stylesheet">
    <!-- ON SCROLL ANIMATION -->
    <link href="<?= BASE_URL ?>css/animate.css" rel="stylesheet">
    <!-- TEMPLATE CSS -->
    <!-- <link href="css/blue-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/darkblue-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/indigo-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/pink-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/purple-theme.css" rel="stylesheet"> -->
    <link href="<?= BASE_URL ?>css/skyblue-theme.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet">
    <!-- <link href="css/violet-theme.css" rel="stylesheet"> -->
    <!-- RESPONSIVE CSS -->
    <link href="<?= BASE_URL ?>css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <!-- Bootstrap CSS (For Styling) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    <!-- ----------------  3rd Party Integration -------------------------->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PPNRQKR');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{1182251236034453}');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={1182251236034453}&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '29e47eda376850932afb871e383df1c350e75f6a';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>
    <noscript> <a href=“https://www.smartsupp.com” target=“_blank”>Berkowits</a></noscript>
    <!---------------------------- End 3rd Party Integration ---------------------------->
   
</head>