 <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="<?php echo $url; ?>">BlogTimes<span class="text-primary">.</span></a>
                </div>                 
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu float-right">
                        <li><a href="<?php echo $url; ?>index.php">Home</a></li>
                    <?php 
                        if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'subscriber')) {
                            echo "<li><a href='".$url."admin'><strong>Admin</strong></a></li>";
                        }
                        else
                        {
                             echo "<li><a href='".$url."login.php'><strong>Login</strong></a></li>";
                        }
                    ?>
                        
                      
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->


  