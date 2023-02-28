<?php
    $path = $_POST['path'];
   
    if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
        
        $filename = basename($_FILES['img']['name']);
       
        $destination = $path . $filename;
       
        if (move_uploaded_file($_FILES['img']['tmp_name'], $destination)) {
            
            echo 'File uploaded successfully';
        } else {
           
            echo 'There was an error uploading the file.';
        }
    } else {
      
        echo 'No file was uploaded.';
    }
