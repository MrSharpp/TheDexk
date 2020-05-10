<?php include "includes/admin_header.php"; ?>
<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query); 
        if(!$result) die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $username = $row['username'];
        $password = $row['user_password'];
        $email = $row['user_email'];
        $user_image = $row['user_image'];
?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Profile
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1> 

                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" value="<?php echo $firstname; ?>" class="form-control" name="firstname" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" value="<?php echo $lastname; ?>" class="form-control" name="lastname" readonly>
                        </div>
                        <div class="form-group">
                         <label>User Role:   </label>  <?php echo $_SESSION['user_role']; ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" value="<?php echo $password; ?>" class="form-control" name="password_edit">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <img src="../images/<?php echo $user_image; ?>" height='50' width='60' alt="User D.P." required>
                            <input type="file" name="user_image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save Details" name="btn_edit_profile">
                        </div>
                    </form>
                    <?php } ?>

                    <?php
                        if (isset($_POST['btn_edit_profile'])) {
                            
                           
                           
                           
                            $password = $_POST['password_edit'];
                            $email = $_POST['email'];
                            $user_image = $_FILES['user_image']['name'];
                            $user_image_temp = $_FILES['user_image']['tmp_name'];

                            move_uploaded_file($user_image_temp, "../images/$user_image");
                            if (empty($user_image)) {
                                $query = "SELECT user_image FROM users WHERE user_id = $user_id";
                                $result = mysqli_query($connection, $query); 
                                if(!$result) die(mysqli_error($connection));
                                else {
                                    $row = mysqli_fetch_assoc($result);
                                    $user_image = $row['user_image'];
                                }
                            }

                            $select_randSalt_query = "SELECT randSalt FROM users";
                            $result = mysqli_query($connection, $select_randSalt_query);
                            if (!$result) die(mysqli_error($connection));
                            $row = mysqli_fetch_assoc($result);
                            $salt = $row['randSalt'];
                            $password = crypt($password, $salt);
                            
                            $query = "UPDATE users SET ";
                            $query .= "user_password = '$password', ";
                            $query .= "user_email = '$email', ";
                            $query .= "user_image = '$user_image' ";
                            $query .= "WHERE user_id = $user_id";
                            $result = mysqli_query($connection, $query); 
                            if(!$result) die(mysqli_error($connection));
                            else echo "<h3>Profile Updated Successfully.</h3>";
                            header('Location: '.$_SERVER['REQUEST_URI']);
                        }
                    ?>        
                </div>
            </div>
        </div>            
    </div>
</div>
<?php include "includes/admin_footer.php"; ?>
