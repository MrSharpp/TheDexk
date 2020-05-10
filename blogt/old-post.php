<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>
  
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
           
            <!-- Clicked Post -->
            <?php   
                if (isset($_GET['p_id'])){
                    $post_id = $_GET['p_id'];
                    $update_views_count_query = "UPDATE posts SET post_views_count=post_views_count + 1 WHERE post_id = $post_id";
                    mysqli_query($connection, $update_views_count_query);
                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_video = $row['post_video'];
                    $page_1 = $row['page_1'];
                    $page_2 = $row['page_2'];
                    $post_views_count = $row['post_views_count'];
                    $post_comment_count = $row['post_comment_count'];
            ?>
            
            <h1 class="text-center"><?php echo $post_title; ?></h1>
            <i class="fas fa-comments col-sm-1" style="font-size: 18px;"><?php echo $post_comment_count; ?></i>
            <i class="fas fa-eye" style="font-size: 18px;"><?php echo " ".$post_views_count; ?></i>
            <hr>
            <video width='700' height='250' controls><source src='videos/<?php echo $post_video; ?>' type='video/mp4'>Your browser does not support the video tag. Upgrade your browser.</video>
            <?php
                 if (isset($_GET['page'])){
                    $page = $_GET['page'];
                    switch ($page) {
                        case 1: 
                            postContent($page_1);
                            break;
                        case 2:
                            postContent($page_2);
                            break;
                        default: 
                            postContent($page_1);
                    }
                 } 
             }
            ?>
            <ul class="pager">
                <?php
                    for ($i = 1; $i<=2; $i++) {
                        if ($i == $page)  echo "<li><a class='active_link' href='post.php?p_id=$post_id&page=$i'>$i</a></li>";
                        else  echo "<li><a href='post.php?p_id=$post_id&page=$i'>$i</a></li>";  
                    }
                ?>
            </ul>
            
            <!-- Leave Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="comment_author">Name</label>
                        <input type="text" class="form-control" name="comment_author" required>
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input type="email" class="form-control" name="comment_email" required>
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Comment</label>
                        <textarea class="form-control" name="comment_content" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="btn_comment" class="btn btn-primary">Comment</button>
                </form>
                <?php
                    if (isset($_POST['btn_comment'])) {
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_date) ";
                        $query .= "VALUES($post_id, '$comment_author', '$comment_email', '$comment_content', now())";
                        $result = mysqli_query($connection, $query);
                        if(!$result) die(mysqli_error($connection)); 
                    }
                ?>
            </div><br>

            <!-- Fetching Approved Comments -->
            <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                $query .= "AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
            ?>

            <!-- Displaying Approved Comment -->
            <div class="media">
                <a class="pull-left"><img class="media-object" src="http://placehold.it/64x64" alt="image"></a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author; ?>
                        <small><?php echo $comment_date; ?> at 9:30 PM</small>
                    </h4>
                    <?php echo $comment_content; ?>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>      
<?php include "includes/footer.php"; ?>