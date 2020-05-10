<?php include "includes/admin_header.php";
    if($_SESSION['user_role'] != 'admin')
    {
        header('Location: index.php');
    } 
 ?>

    <div id="wrapper">
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Categories
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                        <div class="col-xs-6">
                            <!-- Add New Category form -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add New Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="btn_add" value="Add Category">
                                </div>
                            </form>
                            <?php  add_new_category();  ?>
                            <?php  if (isset($_GET['edit'])) include "includes/update_categories.php";  ?>
                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover"><!-- Display All Categories Table -->
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th colspan="2">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php display_all_categories(); ?>
                                    <?php delete_category(); ?> 
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/admin_footer.php"; ?>
