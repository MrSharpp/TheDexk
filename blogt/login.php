<?php   
 ob_start(); 
    session_start();
            if (isset($_SESSION['user_role'])){
                header('Location: admin/index.php');
            }

        ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login Admin Panel - BlogTimes.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta name="author" content="Shreethemes" />
        <meta name="Version" content="2.1" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="/assets/css/colors/default.css" rel="stylesheet" id="color-opt">

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
        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="index.php" class="text-white title-dark rounded d-inline-block text-center"><i data-feather="home" class="fea icon-sm"></i></a>
        </div>

        <!-- Hero Start -->
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row no-gutters position-relative">
                    <div class="col-lg-4 cover-my-30 order-2">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card login-page border-0" style="z-index: 1">
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-center">Login</h4>  
                                            <form class="login-form mt-4" action="includes/login.php" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group position-relative">
                                                            <label>Username <span class="text-danger">*</span></label>
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5" placeholder="Username" name="username" required="">
                                                        </div>
                                                    </div><!--end col-->
        
                                                    <div class="col-lg-12">
                                                        <div class="form-group position-relative">
                                                            <label>Password <span class="text-danger">*</span></label>
                                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                                            <input type="password" class="form-control pl-5" placeholder="Password" name="password" required="">
                                                        </div>
                                                    </div><!--end col-->
        
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                                </div>
                                                            </div>
                                                            <p class="forgot-pass mb-0"><a href="javascript:void(0)" class="text-dark font-weight-bold" data-toggle="modal" data-target="#showMessage">Forgot password ?</a></p>
                                                        </div>
                                                    </div><!--end col-->

                                                    <?php if(isset($_GET['error'])){ ?>
                                                     <br>
                                                    <div class="alert alert-danger" role="alert"><?php echo 'Username or Password is incorrect.' ?></div>
                                                    <br>
                                                <?php } ?>
                                              

                                                    <div class="col-lg-12 mb-0">
                                                        <button class="btn btn-primary btn-block" name="btn_login">Sign in</button>
                                                    </div><!--end col-->



                                                    <div class="col-12 text-center">
                                                        <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small> <a href="javascript:void(0)" data-toggle="modal" data-target="#showMessage" class="text-dark font-weight-bold">Sign Up</a></p>
                                                    </div><!--end col-->

                                                </div><!--end row-->
                                            </form>


  

                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->    

                    <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('images/loginPage.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->

  <!-- Modal Start -->
                           

                                    <!-- Modal Content Start -->
                                    <div class="modal fade" id="showMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content rounded shadow border-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Contact Administrator </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="bg-white p-3 rounded box-shadow">
                                                        <p >For this action you need to contact administrator.</p>
                                                        You can contact administrator through email : <span class="text-prmary">amiralam@thedexk.com</span>                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Content End -->
                                </div>
                            </div><!--end col-->
            <!-- Modal End -->

        <!-- javascript -->
        <script src="/assets/js/jquery-3.4.1.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/jquery.easing.min.js"></script>
      
        <!-- Icons -->
        <script src="/assets/js/feather.min.js"></script>
        <!--<script src="/assets/js/unicons-monochrome.js"></script>-->
        
        <!-- Main Js -->
        <script src="/assets/js/app.js"></script>


    <script>
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
		if (isMobile){
		    alert('You cannot get access to admin panel in mobile Please try in another device')
		    window.history.back();
		} 
    </script>

    </body>
</html>