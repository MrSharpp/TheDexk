<?php include "db.php"; ?>
<?php
    
    function displayCategories(){
        global $connection;
        $count = [];
        $top = [];
        $query = "SELECT `cat_id` FROM categories";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['cat_id'];
             $query_p = "SELECT * FROM posts WHERE post_category_id = '$id'";
            $result_p = mysqli_query($connection, $query_p);
            $times = mysqli_num_rows($result_p);
            array_push($count[$id], '6');
        }

    }

    function postContent($post_content) {
        echo "<p>$post_content</p><hr>";
    }

    function getUrlArray($url){
        return  explode('/', $url);

    }
    
?>