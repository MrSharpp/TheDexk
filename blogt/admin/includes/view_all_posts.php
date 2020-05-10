<?php
 // echo '<pre>';
 //    var_dump($_SESSION);
 //    echo '</pre>';
 //   $_SESSION['user_role'] = 'admin';
    if (isset($_POST['checkBoxArray'])) {
        foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
            $bulk_options = $_POST['bulk_options'];
            switch ($bulk_options) {
                case 'published': 
                    $update_post_status_query = "UPDATE posts SET post_status = 'published' WHERE post_id = $checkBoxValue";
                    $result = mysqli_query($connection, $update_post_status_query);
                    if (!$result) die(mysqli_error($connection));
                    break;
                    
                case 'draft':
                    $update_post_status_query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $checkBoxValue";
                    $result = mysqli_query($connection, $update_post_status_query);
                    if (!$result) die(mysqli_error($connection));
                    break;
                    
                case 'delete':
                    $delete_post_query = "DELETE FROM posts WHERE post_id = $checkBoxValue";
                    $result = mysqli_query($connection, $delete_post_query); 
                    if(!$result) die(mysqli_error($connection));
                    break;
                    
                case 'reset_view_count':
                    $reset_view_query = "UPDATE posts SET post_views_count = 0 WHERE post_id = ".mysqli_real_escape_string($connection, $checkBoxValue);
                    $result = mysqli_query($connection, $reset_view_query); 
                    if(!$result) die(mysqli_error($connection));
                    else 
                        header("Location: posts.php");
                    break;
                    
                default: echo "Please select a valid operation !!";
            }
        }
    }
    
?>
<?php if(isset($_GET['message'])) echo '<h3 style="background-color: #5cb85c;color: white;padding: 3px;border-radius: 10px;padding-left: 10px;">'.$_GET['message'].'</h3>';?>
<form action="" method="post"> 
    <table class="table table-bordered table-hover">

        <div id="bulkOptionContainer" class="col-sm-3">
            <select name="bulk_options" class="form-control">
                <option>Select an Option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="reset_view_count">Reset Views Count</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="btn_apply" class="btn btn-success" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>View Count</th>
                <th>Date</th>
                <th colspan="3">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
             if($_SESSION['user_role'] == 'admin')
             {
                post_database('#<admin>'); 
             }else
             {
                post_database($_SESSION['username']);
             }
             
             ?>
            <?php   include "delete_modal.php"; ?>
            <?php
                if (isset($_GET['delete'])) {
                    $post_id = $_GET['delete'];
                    $query = "DELETE FROM posts WHERE post_id = $post_id";
                    $result = mysqli_query($connection, $query); 
                    if(!$result) die(mysqli_error($connection));
                    else  header("Location: posts.php");   
                }
            ?>
            <script>
                $(document).ready(function(){
                    $(".delete_link").on('click', function() {
                        var id = this.rel
                        $('#deleteLink').attr('href', 'posts.php?delete=' + id)
                        $("#myModal").modal('show')
                    });
                });
            </script>
        </tbody>
    </table> 
</form>