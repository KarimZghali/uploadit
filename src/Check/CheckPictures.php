<?php
namespace UPLOADIT\Check;

class CheckPictures
{
    public static function check($bdc, $format) {

        $target_dir = "./advertising/";
     //   $target_file = $target_dir . basename($_FILES["file-Habillage-Pc"]["name"]);
        $target_file = basename($_FILES["file-".$format]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //Rename files
        $infosfichier = pathinfo($_FILES["file-".$format]['name']);
        $extension_upload = $infosfichier['extension'];
        $name = $infosfichier['filename'];
        $file = $bdc.' - '.$format.'.'.$extension_upload;


// Check if image file is a actual image or fake image
        if(isset($_POST["upload"])) {
            $check = getimagesize($_FILES["file-".$format]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["file-".$format]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file-".$format]["tmp_name"], $target_dir . $file)) {
                echo "The file ". basename( $_FILES["file-".$format]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


    }

}