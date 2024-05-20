<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

echo"
<!doctype html>
<html lang='nl'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>$pagetitle</title>
    <meta name='keywords' content='$keywords'>
    <meta name='description' content='$description'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='manifest' href='/site.webmanifest'>
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico'>

    <!-- CSS here -->
    <link rel='stylesheet' href='/assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='/assets/css/owl.carousel.min.css'>
    <link rel='stylesheet' href='/assets/css/slicknav.css'>
    <link rel='stylesheet' href='/assets/css/flaticon.css'>
    <link rel='stylesheet' href='/assets/css/progressbar_barfiller.css'>
    <link rel='stylesheet' href='/assets/css/gijgo.css'>
    <link rel='stylesheet' href='/assets/css/animate.min.css'>
    <link rel='stylesheet' href='/assets/css/animated-headline.css'>
    <link rel='stylesheet' href='/assets/css/magnific-popup.css'>
    <link rel='stylesheet' href='/assets/css/fontawesome-all.min.css'>
    <link rel='stylesheet' href='/assets/css/themify-icons.css'>
    <link rel='stylesheet' href='/assets/css/slick.css'>
    <link rel='stylesheet' href='/assets/css/nice-select.css'>
    <link rel='stylesheet' href='/css/header-and-preloader.css'>    
    <link rel='stylesheet' href='/css/hero.css'>    
    <link rel='stylesheet' href='/css/margins-and-paddings.css'>
    <link rel='stylesheet' href='/css/selfmade-bootstrap.css'>
    <link rel='stylesheet' href='/assets/css/style.css'>
    
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>    
    <script async src='https://www.googletagmanager.com/gtag/js?id=G-T1VG75SCX3'></script>
    <!-- Google tag (gtag.js) -->
    <script>
      window.dataLayer = window.dataLayer || [];
        function gtag(){
            dataLayer.push(arguments);
        }
      gtag('js', new Date());
    
      gtag('config', 'G-T1VG75SCX3');
    </script>
</head>

<body>
<!-- ? Preloader Start -->
<div id='preloader-active'>
    <div class='preloader d-flex align-items-center justify-content-center'>
        <div class='preloader-inner position-relative'>
            <div class='preloader-circle'></div>
            <div class='preloader-img pre-text'>
                <img src='/assets/img/logo/loader.png' alt='Logo van janssens BVBA'>
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class='header-area'>
        <div class='main-header '>
            <div class='header-top d-none d-lg-block'>
                <div class='container'>
                    <div class='col-xl-12'>
                        <div class='row d-flex justify-content-between align-items-center'>
                            <div class='header-info-left'>
                                <ul>
                                    <li><i class='fas fa-phone'></i> +32 89 46 14 47 </li>
                                    <li><i class='far fa-envelope'></i>info@janssensbvba.be</li>
                                </ul>
                            </div>
                            <div class='header-info-right'>
                                <a href='/quote/' class='btn'>Offerte aanvragen <i class='ti-arrow-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='header-bottom header-sticky'>
                <div class='container'>
                    <div class='row align-items-center'>
                        <!-- Logo -->
                        <div class='col-xl-2 col-lg-2'>
                            <div class='logo'>
                                <a href='/'>
                                    <img src='/assets/img/logo/logo.png' alt='' class='headerlogo'>
                                </a>
                            </div>
                        </div>
                        <div class='col-xl-9 col-lg-8'>
                            <div class='menu-wrapper  d-flex align-items-center'>
                                <!-- Main-menu -->
                                <div class='main-menu d-none d-lg-block'>
                                    <nav>
                                        <ul id='navigation'>"; ?>
                                            <li <?php if ($activePage == 'Home') echo 'class="active"'; ?>><a href='/'>Home</a></li>
                                            <li <?php if ($activePage == 'About') echo 'class="active"'; ?>><a href='/about/'>Over ons</a></li>
                                            <li <?php if ($activePage == 'Services') echo 'class="active"'; ?>><a href='/services/'>Diensten</a></li>
                                            <li <?php if ($activePage == 'Projects') echo 'class="active"'; ?>><a href='/projects/'>Projecten</a></li>
                                            <li <?php if ($activePage == 'Blog') echo 'class="active"'; ?>><a href='/blog/'>Blog</a></li>
                                            <li <?php if ($activePage == 'Contact') echo 'class="active"'; ?>><a href='/contact/'>Contact</a></li>

                                        </ul>

                                    </nav>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Menu -->
                        <div class='col-12'>
                            <div class='mobile_menu d-block d-lg-none'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>


