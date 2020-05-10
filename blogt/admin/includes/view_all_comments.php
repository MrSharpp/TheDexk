<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>In Response To</th>
            <th>Status</th>
            <th>Date</th>
            <th colspan="3">Operations Menu</th>
        </tr>
    </thead>
    <tbody>
        <?php comment_database(); ?>
        <?php 
            if (isset($_GET['approve'])) {
                $comment_id = $_GET['approve'];
                $comment_post_id = $_GET['p_id'];
                $query = "UPDATE comments SET comment_status='approved' WHERE comment_id=$comment_id";
                $result = mysqli_query($connection, $query);
                if(!$result) die(mysqli_error($connection));
                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id = $comment_post_id";
                $result = mysqli_query($connection, $query);
                if(!$result) die(mysqli_error($connection));
                else  header("Location: comments.php");
            }
        
            if (isset($_GET['unapprove'])) {
                $comment_id = $_GET['unapprove'];
                $comment_post_id = $_GET['p_id'];
                $query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id=$comment_id";
                $result = mysqli_query($connection, $query);
                if(!$result) die(mysqli_error($connection));
                $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
                $query .= "WHERE post_id = $comment_post_id";
                $result = mysqli_query($connection, $query);
                if(!$result) die(mysqli_error($connection));
                else  header("Location: comments.php");
            }
             
            if (isset($_GET['delete'])) {
                $comment_id = $_GET['delete'];
                $post_id = $_GET['p_id'];
                $query = "DELETE FROM comments WHERE comment_id = $comment_id";
                $result = mysqli_query($connection, $query); 
                if(!$result) die(mysqli_error($connection));
                $query = "UPDATE posts SET post_comment_count=post_comment_count - 1 WHERE post_id=$post_id";
                $result = mysqli_query($connection, $query); 
                if(!$result) die(mysqli_error($connection));
                else  header("Location: comments.php");
            }
        ?>
    </tbody>
</table> 