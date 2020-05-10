<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php 
                    if (isset($_GET['category'])) $post_category_id = $_GET['category'];
                    $result = mysqli_query($connection, "SELECT * FROM posts WHERE post_category_id = $post_category_id");
                    $result_count = mysqli_num_rows($result);
                    if ($result_count < 1) echo "<h2>No Posts Available !!</h2>";
                    else {
                ?>
                <h3><?php echo $result_count." posts found"; ?></h3><hr>
                
                <!-- Posts related to a specific category -->
                <?php                
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
                <?php }} ?>
                
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        </div>
<?php include "includes/footer.php"; ?>