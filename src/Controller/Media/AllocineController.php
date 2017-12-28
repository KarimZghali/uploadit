<?php


namespace UPLOADIT\Controller\Media;
use UPLOADIT\Model\AllocineModel;
use UPLOADIT\Controller\Controller;
use UPLOADIT\Check\CheckPictures;


class AllocineController extends Controller
{

    private $uploadError = '';
    private $formatError = '';

    public function manage($bdc, $media, $emailCustomer) {

        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../../bootstrap.php']);

        $model = new AllocineModel();

        $model->checkBdcPattern($bdc);

        $model->checkBdcData($bdc, $entityManager);


        // Si l'utilisateur renseigne une adresse mail:
        if ($emailCustomer) {
            $model-> addCustomer($bdc, $emailCustomer, $entityManager);
        }

        // Verification si l'img uploadé respecte bien les specifications techniques
        // et upload si tout est ok
        if (isset($_POST["upload"])) {

            $this->formatError = $_POST["format"];
            $allocineCheckPictures = new AllocineModel();
            $allocineCheckPictures->read($bdc, $entityManager, $_POST["format"] );
            $this->uploadError = CheckPictures::check($bdc, $_POST["format"], $allocineCheckPictures);

        }

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

        $model->read($bdc, $entityManager, $format);

        include(__DIR__."/../../../app/views/allocine/manage.php");

    }

    public function boxView($formatBox, $model, $picture) {

        return $model->box($formatBox, $picture, $this->uploadError, $this->formatError);

    }

}
