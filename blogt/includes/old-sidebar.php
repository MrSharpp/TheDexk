    <div class="col-md-4">
        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form action="search_result.php" method="post">
                <div class="input-group">
                    <input type="text" name="search_keyword" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="search_btn" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        
        <!-- User Login Form -->
        <?php   
            if (!isset($_SESSION['user_role'])) {
        ?>
        <div class="well">
            <h4>Login</h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="input-group-btn">
                        <button type="submit" name="btn_login" class="btn btn-primary">Log In</button>
                    </span>
                </div>
            </form>
            <h5 class="text-center"><a href="registration.php">Don't Have An Account ??</a></h5>
        </div>
        <?php } ?>
            
        <!-- Blog Categories -->
        <div class="well">
            <h4>Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        <?php 
                            displayCategories();
                        ?>
                    </ul>
                </div>
            </div>
        </div> 
    </div>