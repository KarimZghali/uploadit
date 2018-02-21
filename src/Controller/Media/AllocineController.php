<?php
namespace UPLOADIT\Controller\Media;
session_start();

use UPLOADIT\Model\AllocineModel;
use UPLOADIT\Controller\Controller;
use UPLOADIT\Check\CheckPictures;

define("PATTERN", "/^[wW][1-9][0-9]{4}$/");

class AllocineController extends Controller
{
    private $uploadError = '';
    private $formatError = '';


    public function manage($bdc, $media, $emailCustomer) {



//        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token']))
//        {
//            $timestamp_ancien = time() - (20*60);
//
//            //If the session token does not match the form token or if the time is up
//            if($_SESSION['token'] != $_GET['token'] || ($_SESSION['token_time'] <= $timestamp_ancien))
//            {
//                header('location: ./');
//                exit;
//            }
//        } else {
//            header('location: ./');
//            exit;
//        }



        //check if the campaign number is conform
        if (!preg_match(PATTERN, $bdc)) {
            header('location: ./?failAuth=true');
            exit;
        }

        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../../bootstrap.php']);

//         var_dump($entityManager);

//         die("??");

        $model = new AllocineModel();

        //Check if the campaign already exists in the DBB
        $model->checkBdcData($bdc, $entityManager);

        //If a sales representative has been entered in the form
        if (isset($_POST['select-commercial'])) {
           $model->AddCommercial($bdc, $entityManager, $_POST['select-commercial']);
        }

        //If a customer has been filled in the form
        if (isset($_POST['email-customer'])) {

        }

        //Search a match with the requested format (technical specifications)
        if (isset($_GET["format"])) {
            if ($_GET["format"] == "Habillage-smartphone") {
                $format = $_GET["format"];
            } else if ($_GET["format"] == "Habillage-tablette") {
                $format = $_GET["format"];
            } else if ($_GET["format"] == "Demi-page") {
                $format = $_GET["format"];
            } else {
                $format = "Habillage-Pc";
            }
        } else {
            $format = "Habillage-Pc";
        }

        //Search a match with the requested format (Upload picture)
        if (isset($_POST["format"]) OR isset($_GET["sup"])) {

            if (isset($_POST["format"])) {
                $newFormat = $_POST["format"];
            } else {
                $newFormat = $_GET["sup"];
            }
            if ($newFormat == "Habillage-smartphone") {
                $formatSetBdd = "HabillageMobileAllocine"; // format pour la function addPicture du model
            } else if ($newFormat == "Habillage-tablette") {
                $formatSetBdd = "HabillageTabletteAllocine";
            } else if ($newFormat == "Demi-page") {
                $formatSetBdd = "DemipageAllocine";
            } else if ($newFormat == "Habillage-Pc") {
                $formatSetBdd = "HabillagePcAllocine";
            } else {
                if (isset($_POST["format"])) {
                    $formatSetBdd = "HabillagePcAllocine";
                } else {
                    $formatSetBdd = "error";
                }
            }
        }

        // Delete an picture
        if (isset($_GET["sup"]) AND $formatSetBdd != "error") {
            $model->deletePicture($formatSetBdd, $bdc, $entityManager);
        }

        // Verification if the uploaded image respects the technical
        // specifications and upload if everything is ok
        if (isset($_POST["upload"])) {
            $this->formatError = $_POST["format"];
            $allocineCheckPictures = new AllocineModel();
            $allocineCheckPictures->read($bdc, $entityManager, $_POST["format"] );
            $this->uploadError = CheckPictures::check($bdc, $_POST["format"], $allocineCheckPictures, $entityManager, $formatSetBdd);
        }

        // Reading data
        $model->read($bdc, $entityManager, $format);
        include(__DIR__."/../../../app/views/allocine/manage.php");
    }

    // Box display
    public function boxView($formatBox, $model, $picture) {

        if ($picture == null && $this->uploadError == true && $this->formatError === $formatBox) {
            include(__DIR__ . "/../../../app/views/ui/boxErrorUpload.php");
        } else if ($picture == null) {
            include(__DIR__ . "/../../../app/views/ui/boxUpload.php");
        } else {
            include(__DIR__ . "/../../../app/views/ui/boxManage.php");
        }
    }

}