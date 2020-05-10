<?php  include "includes/functions.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>
    
<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1 class="text-center">Register</h1>
                        <form role="form" action="registration.php" method="post">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                            </div>
                             <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                            </div>
                             <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                            </div>
                            <input type="submit" name="btn_register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>
                        <?php
                            if (isset($_POST['btn_register'])) {
                                $username = $_POST['username'];
                                $email    = $_POST['email'];
                                $password = $_POST['password'];
                                $username = mysqli_real_escape_string($connection, $username);
                                $password = mysqli_real_escape_string($connection, $password);
                                $email    = mysqli_real_escape_string($connection, $email);

                                $select_randSalt_query = "SELECT randSalt FROM users";
                                $result = mysqli_query($connection, $select_randSalt_query);
                                if (!$result) die(mysqli_error($connection));
                                $row = mysqli_fetch_assoc($result);
                                $salt = $row['randSalt'];
                                $password = crypt($password, $salt);

                                $register_user_query = "INSERT INTO users(username,user_email,user_password,user_role) ";
                                $register_user_query .= "VALUES('$username','$email','$password','subscriber')";
                                $result = mysqli_query($connection, $register_user_query);
                                if (!$result) die("Query Failed ".mysqli_error($connection).' '.mysqli_errno($connection));
                                else echo "<h3 class='text-center'>Registration Successful</h3>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div> 
    </section>
           
<?php include "includes/footer.php";?>
