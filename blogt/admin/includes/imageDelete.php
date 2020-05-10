<?php


    // Get src.
    $src =  $_POST["src"];

    $myfile = fopen("newfile.txt", "w");
	// fwrite($myfile, ;
	// fclose($myfile);

    // Check if file exists.
    if (file_exists("uploads/" . basename($src))) {
      // Delete file.
      unlink("uploads/" . basename($src));
    }
?>