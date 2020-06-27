<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
       <title><?php echo $title; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="<?php echo $description; ?>"/>
        <meta name="keywords" content="<?php echo $tags; ?>"/>
        <meta name="author" content="TheDexk"/>
        <meta name="Version" content="1.0"/>
        
        <meta property="og:title" content="<?php echo $title; ?>"/>
        <meta property="og:description" content="<?php echo $description; ?>"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://www.thedexk.com"/>
        <meta property="og:image" content="image/metaimage.jpg"/>
        
        <meta name="twitter:title" content="<?php echo $title; ?>" />
        <meta name="twitter:description" content="<?php echo $description; ?>" />
        <meta name="twitter:card" content="summary_large_image" />

        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
         <!--  favicon  -->
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <!--  Bootstrap  -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.7/css/unicons.css">
        <!-- Slider -->
        <link rel="stylesheet" href="css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="css/owl.theme.default.min.css"/>
        <!-- Main Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
        <link rel="home" href="http://thedexk.com"/>
        
  </head>

    <body>
    <style>
        @font-face {
            font-family: 'sofia-pro';
            src: url('fonts/sofiapro-light.otf');
        }
        @font-face {
            font-family: 'sofia-prob';
            src: url('fonts/sfb.ttf');
        }

        body{
            font-family: sofia-pro;

        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: sofia-pro;
            line-height: 1.5;
            font-weight: 600;
        }
    </style>
        <!--  Navbar STart  -->
        
<header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!--  Logo container -->
                <div>
                    <a class="logo" href="#" title="home">
<span class="text-dakk" style="font-family: 'Pacifico', cursive;color: #5d5c5c;">Dexk</span><span class="text-primary">.</span></a>
                </div>                 
                <div class="buy-button">
                    <a href="page-contact-three.php" title="TheDexk Contact Us" class="btn btn-primary">Get a Website</a>
                </div><!-- end login button -->
                <!--  End Logo container -->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!--  Mobile menu toggle -->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!--  End mobile menu toggle -->
                    </div>
                </div>

                <div id="navigation">
                    <!--  Navigation Menu -->
                    <ul class="navigation-menu nav-<?php echo $siteColor; ?>">
                        <li><a href="index.php">Home</a></li>
                        <li class="last-elements"><a href="index-portfolio.php">Portfolio</a></li>
                <li class="last-elements"><a href="/blog" target="_blank">Blog</a></li>
                    </a></ul><!-- end navigation menu --><a href="index-portfolio.php">
                    </a><div class="buy-menu-btn d-none"><a href="index-portfolio.php">
                        </a><a href="page-contact-three.php" class="btn btn-primary">Contact Us</a>
                    </div><!-- end login button -->
                </div><!-- end navigation -->

            </div><!-- end container -->
        </header><!-- end header -->
        <!--  Navbar End  -->
        

