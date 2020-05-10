<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments Database
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1> 
                        <?php
                            if (isset($_GET['source'])) 
                                $source = $_GET['source'];
                            else
                                $source = '';
                            switch ($source) {
                                case 'nbmnbmnbn': echo "hello";
                                    break;
                                default : include "includes/view_all_comments.php";
                            }
                        ?>          
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php include "includes/admin_footer.php"; ?>
