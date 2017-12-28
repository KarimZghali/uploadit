<?php
namespace UPLOADIT\Check;
use UPLOADIT\Model\AllocineModel;

class CheckPictures
{
    public static function check($bdc, $format, $mediaObj) {

        $errorUpload = null;

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
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $errorUpload = $errorUpload."Votre fichier n'est pas de type image.<br/>";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            $errorUpload = $errorUpload."Un visuel existe déjà pour cette campagne.<br/>";
            $uploadOk = 0;
        }

// Check file size
        if ($_FILES["file-".$format]["size"] > $mediaObj->getWeight() * 100) {
            $gap = ($_FILES["file-".$format]["size"]/1000) - $mediaObj->getWeight();
            $errorUpload =  $errorUpload."Votre fichier est trop lourd, il dépasse de ".$gap."ko.<br>";
            $uploadOk = 0;
        }

        if ($width != $mediaObj->getWidth()) {
            $errorUpload = $errorUpload."La largeur de l'image doit être de ".$mediaObj->getWidth()."px.<br/>";
            $uploadOk = 0;
        }

        if ($height != $mediaObj->getHeight()) {
            $errorUpload = $errorUpload."La hauteur de l'image doit être de ".$mediaObj->getHeight()."px.<br/>";
            $uploadOk = 0;
        }

// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $errorUpload = $errorUpload."Le ".$extension_upload." n'est pas accépté (jpeg, jpg, png, gif uniquement).<br/>";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return $errorUpload;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file-".$format]["tmp_name"], $target_dir . $file)) {
                return $errorUpload;
            } else {
                return $errorUpload."Sorry, there was an error uploading your file.";
            }
        }


    }

}
