<?php error_reporting(E_ALL);
ini_set('display_errors', 1);?>
<link href="http://blogtimes.thedexk.com/admin/includes/includes/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://blogtimes.thedexk.com/admin/includes/includes/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="http://blogtimes.thedexk.com/admin/includes/includes/image.min.js"></script>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" maxlength="80" name="post_title" required>
    </div>
    <div class="form-group">
        <label for="post_image">Select Category </label>
        <select name="post_category_id" required>   
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
        <label for="post_image">Select Status </label>
        <select name="post_status" required>   
            <option>Select an Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" id="post_image" required>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" required>
    </div>
    
    <div class="form-group">
        <label for="page_1">Description</label>
        <textarea class="form-control" id="description" minlength="117" name="description" maxlength="160" required></textarea>
    </div>

    <div class="form-group">
        <label for="page_1">Start Writing Here</label>
        <textarea id="example" name="content" required></textarea>
    </div>
   
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Add Post" name="btn_add_post">
    </div>
</form>
<?php
    if (isset($_POST['btn_add_post'])) {
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_SESSION['username'];
        $post_status = $_POST['post_status'];
        if($post_status == 'Select an Option') $post_status = 'draft';
        $post_image = $_FILES['post_image']['name'];
        $slug = slugify($post_title);
        
        $post_tags = $_POST['post_tags'];
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $content = mysqli_real_escape_string($connection, $_POST['content']);
 
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, description, content,  post_tags, post_status, slug) ";
        $query .= "VALUES($post_category_id,'$post_title','$post_author',now(),'$post_image','$description','$content','$post_tags','$post_status', '$slug')";
        $result = mysqli_query($connection, $query); 
        if(!$result) die(mysqli_error($connection));
        else {
            $created_post_id = mysqli_insert_id($connection);
            header('Location: posts.php?message=post Added successfully');
        }
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
        },
        'image.error': function(error, response)
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

<SCRIPT type="text/javascript">
    $("#post_image").change(function(){
     ValidateFileUpload();
    })


    function ValidateFileUpload() {
        var fuData = document.getElementById('post_image');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {

                    var reader = new FileReader();
                    reader.readAsDataURL(fuData.files[0]);
                    
                    reader.onload = function (e) {
                       
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                  
                    var width = this.width;
                    if (height > 1200 || width > 1200) {
                        alert("Height and Width must not exceed 1200 x 1200.");
                         $("#post_image").val('');
                    }
                  
                }
                  
            }
            
}
//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
                $("#post_image").val('');

            }
        }
    }
</SCRIPT>

