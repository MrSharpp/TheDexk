<link href="http://blogtimes.thedexk.com/admin/includes/includes/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://blogtimes.thedexk.com/admin/includes/includes/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="http://blogtimes.thedexk.com/admin/includes/includes/image.min.js"></script>


<?php 
    if (isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $result = mysqli_query($connection, $query); 
        if(!$result) die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_author = $row['post_author'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $description = $row['description'];
        $content = $row['content']; 
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title" required>
    </div>
    <div class="form-group">
        <select name="post_category_id">   
            <?php
                $query = "SELECT * FROM categories";
                $result = mysqli_query($connection, $query);
                if (!$result) die(mysqli_error($connection));
                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<option value='$cat_id'>$cat_title</option>";
                }
            ?>
        </select>
    </div>  
    <div class="form-group">
        <select name="post_status">
            <?php echo "<option value='$post_status'>$post_status</option>"; ?>
            <?php
                if ($post_status == 'draft') echo "<option value='published'>publish</option>";
                else echo "<option value='draft'>draft</option>";
            ?>
        </select>
    </div>    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img src="../images/<?php echo $post_image; ?>" width="100" name="post_image" alt="image" required>
        <input type="file" name="image">
    </div>    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" maxlength="80"  class="form-control" name="post_tags" required>
    </div>   

    <div class="form-group">
        <label for="page_1">Description</label>
        <textarea class="form-control" id="description" minlength="200" name="description" maxlength="284" required><?php echo $description; ?></textarea>
    </div>

    <div class="form-group">
        <label for="page_1">Start Writing Here</label>
        <textarea id="example" name="content" required><?php echo $content; ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Save Post" name="btn_edit_post">
    </div>
</form>

<?php } ?>
<?php 
    if (isset($_POST['btn_edit_post'])) {
        $post_id = $_GET['p_id'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $description = $_POST['description'];
        $content_c = mysqli_real_escape_string($connection, $_POST['content']);

        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        if (empty($post_image)) {
            $query = "SELECT post_image FROM posts WHERE post_id = $post_id";
            $result = mysqli_query($connection, $query); 
            if(!$result) die(mysqli_error($connection));
            else {
                $row = mysqli_fetch_assoc($result);
                $post_image = $row['post_image'];
            }
        }
        
        $query = "UPDATE posts SET ";
        $query .= "post_title = '$post_title', ";
        $query .= "post_category_id = $post_category_id, ";
        // $query .= "post_date = now(), ";
        $query .= "post_status = '$post_status', ";
        $query .= "post_tags = '$post_tags', ";
        $query .= "content = '$content_c',";
        $query .= `description = "$description", `;
        $query .= "post_image = '$post_image' ";
        $query .= "WHERE post_id=$post_id";
        
        // echo $query;

        $result = mysqli_query($connection, $query); 
        if(!$result) die(mysqli_error($connection));
        else header('Location: ./posts.php');
    }     
?>
<script>
  new FroalaEditor('#example', {
    // Set the image upload URL.
    imageUploadURL: 'http://blogtimes.thedexk.com/admin/includes/imageUpload.php',
    fileUpload: false,
    imageCORSProxy: 'https://cors-anywhere.herokuapp.com',
    videoUpload: false,
    events: {
        'image.removed': function($img){
            $.ajax({
                method: "POST",
                url: "http://blogtimes.thedexk.com/admin/includes/imageDelete.php",
                imageCORSProxy: 'https://cors-anywhere.herokuapp.com',
                data: {src: $img.attr('src')}
            }).done (function (data) {
          if(data=='"Success"'){
            console.log ('image was deleted');  
          } else {
            console.log(data);
          }
        })
        .fail (function (err) {
          console.log ('image delete problem: ' + JSON.stringify(err));
        })
        },'image.error': function(error, response)
        {
            response  = 'ERROR: Image dimensions should be lesser then 1200 x 1200px';
            console.log(response);
            alert(response);
        }
    }
  })
</script>

<script>
    // $(document).keydown(function(){
    //      $('a[href^="https://www.froala.com/wysiwyg-editor?k=u"]').css('visibility', 'hidden');
    // })
    
    $(document).on('ready', function(){
        setTimeout(function(){ 
            
            $('a[href^="https://www.froala.com/wysiwyg-editor?k=u"]').css('font-size', '0.01px');
            $('a[href^="https://www.froala.com/wysiwyg-editor?k=u"]').css('padding-bottom', '0.01px');
            $('a[href^="https://www.froala.com/wysiwyg-editor?k=u"]').css('visibility', 'hidden');
            $("#logo").empty();
        }, 500);
        
        
        
    })

</script>
