<!doctype html>
<html lang="en">
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MINASA | Madrasah Ibtidaiyah Nasy'atul Muta'allimin</title>
    <meta name="description" content="Website Resmi Universitas Nahdlatul Ulama Indonesia">
    <meta name="keyword" content="Unusia,UNUSIA,UNU,NU,Nahdlatul Ulama,Universitas Nahdlatul Ulama Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Tag -->
    <link rel="canonical" href="" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="UNUSIA | Universitas Nahdlatul Ulama Indonesia" />
    <meta property="og:description" content="Website Resmi Universitas Nahdlatul Ulama Indonesia" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="UNUSIA" />
    <meta property="og:image" content="<?= base_url() ?>assets/templates/images/logobig.jpg" />
    <meta property="og:image:secure_url" content="<?= base_url() ?>assets/templates/images/logobig.jpg" />
    <meta property="og:image:width" content="560" />
    <meta property="og:image:height" content="315" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Website Resmi Universitas Nahdlatul Ulama Indonesia" />
    <meta name="twitter:title" content="UNUSIA | Universitas Nahdlatul Ulama Indonesia" />
    <meta name="twitter:site" content="https://twitter.com/unuindonesia" />
    <meta name="twitter:image" content="<?= base_url() ?>assets/templates/images/logobig.jpg" />

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/templates/images/favicon4.png">
    <link href="<?= base_url() ?>assets/templates/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/preloader.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/meanmenu.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/swiper-bundle.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/backToTop.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/elegantFont.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/style.css">

    <script src="<?= base_url() ?>assets/templates/js/vendor/jquery-3.5.1.min.js"></script>
</head>

<body>
    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two" style="left:20px;"></div>
                <div class="object" id="object_three" style="left:40px;"></div>
                <div class="object" id="object_four" style="left:60px;"></div>
                <div class="object" id="object_five" style="left:80px;"></div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <?php $this->load->view('dir/navigation'); ?>


    <!-- sidebar area start -->
    <div class="sidebar__area">
        <div class="sidebar__wrapper">
            <div class="sidebar__close">
                <button class="sidebar__close-btn" id="sidebar__close-btn">
                    <span><i class="fal fa-times"></i></span>
                    <span>close</span>
                </button>
            </div>
            <div class="sidebar__content">
                <div class="logo mb-40">
                    <a href="#">
                        <img src="assets/frontend/images/logo-basic.png" width="145" alt="logo">
                    </a>
                </div>
                <div class="mobile-menu fix"></div>

                <div class="sidebar__search p-relative mt-40 ">
                    <form action="search" method="GET">
                        <input type="text" name="search_query" placeholder="Search something..." required>
                        <button type="submit"><i class="fad fa-search"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- sidebar area end -->
    <div class="body-overlay"></div>
    <!-- sidebar area end -->