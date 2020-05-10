<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
            if (isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                $result = mysqli_query($connection, $query);
                if (!$result) 
                    die(mysqli_error($connection));
                $row = mysqli_fetch_assoc($result);
                $cat_title = $row['cat_title'];      
        ?>
        <input type="text" class="form-control" value="<?php echo $cat_title; ?>" name="cat_title">
        <?php } ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="btn_update" value="Update Category">
    </div>
</form>
<?php   edit_category();    ?>