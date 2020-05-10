
<?php include "includes/admin_header.php"; ?>
    <div id="wrapper"> 
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small><?php echo " ".$_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            if($_SESSION['user_role'] == 'admin')
                                            {
                                                $post_count = recordCount('posts');
                                            }else{
                                                $post_count = postCountModerator($_SESSION['username']);
                                            }
                                            
                                            echo "<div class='huge'>$post_count</div>";
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-eye fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                             if($_SESSION['user_role'] == 'admin') $param = 'admin';
                                            else $param = $_SESSION['username'];
                                            echo "<div class='huge'>".getViews($param)."</div>";
                                        ?>
                                        <div>Views</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $user_count = recordCount('users');
                                            echo "<div class='huge'>$user_count</div>";
                                        ?>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <?php if($_SESSION['user_role'] == 'admin'){ ?>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        <?php } ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $category_count = recordCount('categories');
                                            echo "<div class='huge'>$category_count</div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <?php if($_SESSION['user_role'] == 'admin'){ ?>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                    if($_SESSION['user_role'] == 'admin') $result = mysqli_query($connection, "SELECT * FROM posts WHERE post_status='draft'"); 
                    else  $result = mysqli_query($connection, "SELECT * FROM posts WHERE post_status='draft' AND  post_author = '".$_SESSION['username']."'"); 
                    
                    if(!$result) die(mysqli_error($connection));
                    $draft_post_count = mysqli_num_rows($result);
                
                    if($_SESSION['user_role'] == 'admin') $result = mysqli_query($connection, "SELECT * FROM posts WHERE post_status='published'"); 
                    else $result = mysqli_query($connection, "SELECT * FROM posts WHERE post_status='published' AND  post_author = '".$_SESSION['username']."'"); 

                    if(!$result) die(mysqli_error($connection));
                    $published_post_count = mysqli_num_rows($result);
                    
                
                    $result = mysqli_query($connection, "SELECT * FROM users WHERE user_role='subscriber'"); 
                    if(!$result) die(mysqli_error($connection));
                    $subscriber_count = mysqli_num_rows($result);               
                ?>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
        <?php
            $element_text = ['All Posts','Active Posts','Draft Posts','Users','Subscribers','Categories'];
            $element_count = [$post_count,$published_post_count,$draft_post_count,$user_count,$subscriber_count,$category_count];
            
            for ($i=0; $i<6; $i++) {
                echo "['$element_text[$i]',$element_count[$i]],";
            }
        ?>
            
        ]);
        var options = {
          chart: {
            title: 'Blog Statistics',
            subtitle: 'Count',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
<?php include "includes/admin_footer.php"; ?>