<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email-ID</th>
            <th>Image</th>
            <th>Role</th>
            <th colspan="2">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php user_database(); ?>
        <?php 
        
            if (isset($_GET['delete'])) {
                $user_id = $_GET['delete'];
                $query = "DELETE FROM users WHERE user_id = $user_id";
                $result = mysqli_query($connection, $query); 
                if(!$result) die(mysqli_error($connection));
                else {
                    header("Location: users.php");
                }
            }
        
        ?>
    </tbody>
</table> 