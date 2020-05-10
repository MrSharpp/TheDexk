<?php  include "../includes/db.php"; ?>
<?php

    function recordCount($table) {
        global $connection;
        $result = mysqli_query($connection, "SELECT COUNT(*) FROM $table"); 
        if(!$result) die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
        return $row['COUNT(*)'];
    }

    function postCountModerator($username)
    {
        global $connection;
        $result = mysqli_query($connection, "SELECT COUNT(*) FROM posts WHERE post_author = '$username'"); 
        if(!$result) die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
        return $row['COUNT(*)'];
    }

    function getViews($username){
        global $connection;
        if($username != 'admin')
        {
        $query = "SELECT SUM(post_views_count) post_views_count FROM posts WHERE post_author = '$username'";
        }
        else
        {
        $query = 'SELECT SUM(post_views_count) post_views_count FROM posts';
        }
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['post_views_count'];


    }

    function post_database($username) {  //Display Posts Database
        global $connection;
        if($username == '#<admin>')
        {
            $query = "SELECT * FROM posts ORDER BY post_id DESC";
        }
        else
        {
             $query = "SELECT * FROM posts WHERE post_author='" . $username . "' ORDER BY post_id DESC";
        }
       
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_title = substr($post_title,0,13) . '...';
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_views_count = $row['post_views_count'];
            $post_date = $row['post_date'];
            $slug = $row['slug'];
            
            echo "<tr>";
            echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='$post_id'></td>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";
       
            $select_category_query = "SELECT cat_title FROM categories WHERE cat_id = ".$post_category_id;
            $category_result = mysqli_query($connection, $select_category_query);
            $category_row = mysqli_fetch_assoc($category_result);

            if($category_row == null){
                $cat_title = '<i style="color:red;">Category Deleted</i>';
            }
            else
            {
               $cat_title = $category_row['cat_title'];

            }
            
            echo "<td>$cat_title</td>";
            echo "<td>$post_status</td>";
            echo "<td><img class='img-responsive' width='100px' src='../images/$post_image'></td>";
            echo "<td>$post_views_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='../post.php/$post_id/$slug' target='_blank'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
            echo "<td><a   class='delete_link' rel='$post_id' href='javascript:void(0)'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function comment_database() {  //Display Comments Database
        global $connection;
        $query = "SELECT * FROM comments";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            $comment_id = $row['comment_id']; 
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
            
            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_email</td>";
            
            $select_post_query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $post_result = mysqli_query($connection, $select_post_query);
            $post_row = mysqli_fetch_assoc($post_result);
            $post_title = $post_row['post_title'];
            $post_id = $post_row['post_id'];
            
            echo "<td><a href='../post.php?p_id=$post_id&page=1'>$post_title</a></td>";
            echo "<td>$comment_status</td>";
            echo "<td>$comment_date</td>";
            echo "<td><a href='comments.php?approve=$comment_id&p_id=$comment_post_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id&p_id=$comment_post_id'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete=$comment_id&p_id=$post_id'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function user_database() {  //Display Users Database
        global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id']; 
            $username = $row['username']; 
            $user_firstname = $row['user_firstname']; 
            $user_lastname = $row['user_lastname']; 
            $user_email = $row['user_email']; 
            $user_image = $row['user_image']; 
            $user_role = $row['user_role']; 
              
            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td><img src='../images/$user_image' width='40' height='30'></td>";
            echo "<td>$user_role</td>";
            echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
            echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>"; 
            echo "</tr>";
        }
    }
    
    function add_new_category() {   // Add new Category
        
        global $connection;
        if (isset($_POST['btn_add'])) {
            $cat_title = $_POST['cat_title'];

            if ($cat_title == "" || empty($cat_title)) 
                echo "This field can not be empty !!";
            else {
                $query = 'INSERT INTO categories(cat_title) VALUES("'.$cat_title.'")';
                $result = mysqli_query($connection, $query);
                if(!$result) die(mysqli_error($connection));
            }
        }
        
    }

    function delete_category() { //Delete Categories
        global $connection;
        if (isset($_GET['delete'])) {
            $cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = $cat_id";
            $result = mysqli_query($connection, $query);

            if (!$result) 
                die(mysqli_error($connection));
            else 
                header("Location: categories.php");
        }
    }

    function edit_category() {  //Edit Categories
        global $connection;
        if (isset($_POST['btn_update'])) {
            $cat_title = $_POST['cat_title'];
            $cat_id = $_GET['edit'];
            if ($cat_title == "" || empty($cat_title)) 
                echo "This field can not be empty !!";
            else {
                $query = "UPDATE categories SET cat_title = '$cat_title' ";
                $query .= "WHERE cat_id = $cat_id";
                $result = mysqli_query($connection, $query);
                if(!$result) die(mysqli_error($connection));
            }
        } 
    }
    
    function display_all_categories() { //Display Categories Details
        global $connection;
        $query = "SELECT * FROM categories ORDER BY cat_id ASC";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo "<tr>";
            echo "  <td>$cat_id</td>";
            echo "  <td>$cat_title</td>";
            echo "  <td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
            echo "  <td><a href='categories.php?edit=$cat_id'>Edit</a></td>";
            echo "</tr>";
        }
    }

  function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}



?>