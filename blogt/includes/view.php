<?php 
include "db.php";
$postId = $_POST['id'];
$stmt = $connection->prepare("update posts set `post_views_count` = post_views_count + 1  WHERE `post_id` = '$postId'");
 $stmt->execute();
?>