<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
                <!-- Posts matching the search keyword -->
                <?php
                    if (isset($_POST['search_btn'])) {
                        $search_keyword = $_POST['search_keyword'];
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search_keyword%'";
                        $result = mysqli_query($connection, $query); 
                        if (!$result)  die(mysqli_error($connection)); 
                        $row_count = mysqli_num_rows($result);
                        if ($row_count == 0)  echo "<h2>No Posts Matches Your Search Keyword !!</h2>";   
                        else {
                            echo "<h3>".$row_count." Posts Matches Your Search Keyword</h3><hr>";
                            while($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content_excerpt = $row['post_content_excerpt'];
                                $post_views_count = $row['post_views_count'];
                                $post_comment_count = $row['post_comment_count'];
                ?>
                
                <h2><a href="post.php?p_id=<?php echo $post_id; ?>&page=1"><?php echo $post_title; ?></a></h2>
                <p class="lead">
                    By <a href="author_specific_posts.php?post_author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?> at 10:00 PM <i class="fas fa-comments"><?php echo " ".$post_comment_count; ?></i> <i class="fas fa-eye"><?php echo " ".$post_views_count; ?></i></p>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>"><br>
                <p>
                    <?php echo $post_content_excerpt; ?>
                    <a href="post.php?p_id=<?php echo $post_id; ?>&page=1"><strong>Read More</strong></a>
                </p>
                <hr>
                <?php 
                            }
                        }
                    } 
                ?>
            </div>
            <!-- Blog Sidebar Widgets -->
            <?php include "includes/sidebar.php"; ?>
        </div>
<?php include "includes/footer.php"; ?>