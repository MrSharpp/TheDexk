<?php  
    ob_start(); 
    session_start(); 
    $url = "http://blogtimes.thedexk.com/";
    $fzf = "http://blogtimes.thedexk.com/page-error.php";
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title; ?></title>
        
         <!-- Open Graph / Facebook -->
          <meta property="og:site_name" content="BlogTimes." />
        <meta property="og:url" content="<?php echo $page_url; ?>" />
        <meta property="og:title" content="<?php echo $page_title; ?>" />
        <meta property="og:description" content="<?php echo $page_description; ?>" />
        <meta property="og:image" content="<?php echo $page_image; ?>" />
<!--        <meta property="og:image:secure_url" content="http://www.thedexk.com/images/woho.jpg" /> -->
<!--        <meta property="og:image:type" content="image/jpeg" /> -->

        <meta name="description" content="<?php echo $page_description; ?>" />
        <meta name="keywords" content="<?php echo $page_tags; ?>" />
        <meta name="author" content="<?php echo $page_author; ?>" />
        <meta name="Version" content="1.0" />
        <link href="<?php echo $page_url; ?>" rel="canonical" >
        
         
        
         <meta property="facebook:title" content="<?php echo $page_title; ?>" />
        <meta property="facebook:description" content="<?php echo $page_description; ?>"/>
       <meta property="facebook:image:secure_url" content="<?php echo $page_image; ?>"/>
        <meta property="facebook:url" content="<?php echo $page_url; ?>"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $page_title; ?>" />
        <meta name="twitter:description" content="<?php echo $page_description; ?>" />
        
        
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="<?php echo $url; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="<?php echo $url; ?>assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->               
        <link rel="stylesheet" href="<?php echo $url; ?>assets/css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="<?php echo $url; ?>assets/css/owl.theme.default.min.css"/> 
        <!-- Main Css -->
        <link href="<?php echo $url; ?>assets/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="<?php echo $url; ?>assets/css/colors/default.css" rel="stylesheet" id="color-opt">
    </head>

    <body>
                <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        