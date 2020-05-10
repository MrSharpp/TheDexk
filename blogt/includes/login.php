<?php
    include "db.php";
    session_start();
?>

<?php
    if (isset($_POST['btn_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($connection, $username);
        $password_typed = mysqli_real_escape_string($connection, $password);
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        if (!$result) die(mysqli_error($connection));

        $row = mysqli_fetch_assoc($result);
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $password_stored = $row['user_password'];
        $password_typed = crypt($password_typed, $password_stored);

        if($password_typed === $password_stored) {
            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['user_role'] = $user_role;
            header("Location: ../admin");
        }
        else
        {
            header("Location: ../login.php?error");
        }
    }
?>
