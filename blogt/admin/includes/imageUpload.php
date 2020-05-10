<?php

    // Allowed extentions.
    $allowedExts = array("gif", "jpeg", "jpg", "png");

    // Get filename.
    $temp = explode(".", $_FILES["file"]["name"]);

    // Get extension.
    $extension = end($temp);

    // An image check is being done in the editor but it is best to
    // check that again on the server side.
    // Do not use $_FILES["file"]["type"] as it can be easily forged.
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

    if ((($mime == "image/gif")
    || ($mime == "image/jpeg")
    || ($mime == "image/pjpeg")
    || ($mime == "image/x-png")
    || ($mime == "image/png"))
    && in_array($extension, $allowedExts)) {
            
            $image_info = getimagesize($_FILES["file"]["tmp_name"]);
            $image_width = $image_info[0];
                $image_height = $image_info[1];
            
     
        if($image_width > 1200 || $image_height > 1200)
        {
        $response = new StdClass;
        $response->error = "Image dimension shoulbe in 1200 x 1200px";

        fwrite($myfile, stripslashes(json_encode($response)));
        echo stripslashes(json_encode($response));
        exit();
        }
        
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        // Save file in the uploads folder.
        move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/uploads/" . $name);

        // Generate response.
        $response = new StdClass;
        $response->link = "http://blogtimes.thedexk.com/admin/includes/uploads/" . $name;
        fwrite($myfile, stripslashes(json_encode($response)));
        echo stripslashes(json_encode($response));
    }
?>