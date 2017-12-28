<?php
namespace UPLOADIT\Check;
use UPLOADIT\Model\AllocineModel;

class CheckPictures
{
    public static function check($bdc, $format, $mediaObj) {
        var_dump($mediaObj->getWeight());



        $target_dir = "./advertising/";
     //   $target_file = $target_dir . basename($_FILES["file-Habillage-Pc"]["name"]);
        $target_file = basename($_FILES["file-".$format]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        // Recovering the height and width of the uploaded file
        $tmp=$_FILES["file-".$format]['tmp_name'];
        list($width,$height)=getimagesize($tmp);




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
        if ($_FILES["file-".$format]["size"] > $mediaObj->getWeight() * 100) {
            $gap = ($_FILES["file-".$format]["size"]/1000) - $mediaObj->getWeight();
            echo "Sorry, your file is too large.".$gap." ko too much";
            $uploadOk = 0;
        }

        if ($width != $mediaObj->getWidth()) {
            echo "La largeur de l'image doit etre de ".$mediaObj->getWidth()."px alors que votre visuel à une largeur de ".$width."px";
            $uploadOk = 0;
        }

        if ($height != $mediaObj->getHeight()) {
            echo "La hauteur de l'image doit etre de ".$mediaObj->getHeight()."px alors que votre visuel à une hauteur de ".$height."px";
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