<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">Admin</a>
    </div>
    
    <!-- Top-Bar Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php?page=1">Home</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
   
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-dashboard" id="dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_drop_down"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_drop_down" class="collapse">
                    <li id="viewallpost">
                        <a href="posts.php">View All Posts</a>
                    </li>
                    <li id="addnewpost">
                        <a href="posts.php?source=add_post">Add New Post</a>
                    </li>
                </ul>
            </li>
            <?php if($_SESSION['user_role'] == 'admin'){ ?>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories </a>
            </li>
        
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users_drop_down"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users_drop_down" class="collapse">
                    <li>
                        <a href="users.php">View All Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Add New User</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <li><a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a></li>
        </ul>
    </div>
</nav>