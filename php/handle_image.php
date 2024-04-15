<?php

include "conn.php";
    $targetDir = "../img/upload/";

if(!empty($_FILES["file"])){
    $targetFile = $targetDir.basename($_FILES["file"]["name"]);
    
    if(file_exists($targetFile)){
        echo "Sorry, the file already exists";
        
    }else{
        if($_FILES["file"]["size"] > 5242880){
            echo "Sorry, your file is to large. Maximum file size is 5MB.";
            
        }else{
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            
            if(!in_array($fileExtension, $allowedExtensions)){
                echo "Sorry, only JPG, JPEG, PNG and GIF files are allowed.";
            }else{
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
                    echo "The file ". basename($_FILES["file"]["name"]) . " has been uploaded.";
                }else{
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}else{
    echo "No file uploaded.";
}
?>