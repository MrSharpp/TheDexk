<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>
   
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">
   
    <div class="col-md-8">
        <!-- All Published Posts Limit to 5 post per page -->
        <?php
            $post_per_page = 5;
            if (isset($_GET['page'])) $page = $_GET['page'];
            else  $page = 0;
            if ($page == 0 || $page == 1) $page_1 = 0;
            else $page_1 = ($page * $post_per_page) - $post_per_page;
            
            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $result = mysqli_query($connection, $query);
            if(!$result) die(mysqli_error($connection));
            $count = mysqli_num_rows($result);
            $count = ceil($count / $post_per_page);
        
            if ($count < 1)  echo "<h2>No Posts Available !!</h2>";
            else {            
            $query = "SELECT * FROM posts LIMIT $page_1,$post_per_page";
            $result = mysqli_query($connection, $query);
            if(!$result) die(mysqli_error($connection));
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
    <!-- Sidebar Widgets -->
    <?php include "includes/sidebar.php"; ?>
</div><!-- Container -->
   
    <!-- Pagination -->
    <ul class="pager">
        <?php
            for ($i = 1; $i<=$count; $i++) {
                if ($i == $page)  echo "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
                else  echo "<li><a href='index.php?page=$i'>$i</a></li>";
            }
        ?>
    </ul>  
<?php include "includes/footer.php"; ?>