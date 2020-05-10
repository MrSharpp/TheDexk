<?php 
	include 'db.php';

	$ida = $_POST['id'];
	$query = "update posts set post_likes = post_likes + 1 WHERE post_id='$ida'";
	mysqli_query($connection,$query);

?>