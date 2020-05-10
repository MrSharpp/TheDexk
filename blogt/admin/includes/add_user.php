<?php
    if (isset($_POST['btn_add_user'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        move_uploaded_file($user_image_temp, "../images/$user_image");
        $select_randSalt_query = "SELECT randSalt FROM users";
        $result = mysqli_query($connection, $select_randSalt_query);
        if (!$result) die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
        $salt = $row['randSalt'];
        $password = crypt($password, $salt);
        
        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_password, user_email, user_image) ";
        $query .= "VALUES('$firstname','$lastname','$user_role','$username','$password','$email', '$user_image')";
        $result = mysqli_query($connection, $query); 
        if(!$result) die(mysqli_error($connection));
        else  echo "<p class='bg-success'>User Created Successfully " . "<a href='users.php'>View Users</a></p>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    
    <div class="form-group">
        <select name="user_role">
            <option value="moderator">moderator</option>
            <option value="admin">Admin</option>
        </select>
    </div>    
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    
    <div class="form-group">
        <label for="user_image">Profile Picture</label>
        <input type="file" name="user_image">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add User" name="btn_add_user">
    </div>
    
</form>