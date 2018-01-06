<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 18/11/2017
 * Time: 12:13
 */

namespace UPLOADIT\Controller\Media;
use UPLOADIT\Model\AllocineModel;
use UPLOADIT\Controller\Controller;
use UPLOADIT\Check\CheckPictures;


class AllocineController extends Controller
{

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

            $allocineForCheckPictures = new AllocineModel();
            $allocineForCheckPictures->read($bdc, $entityManager, $_POST["format"] );
            CheckPictures::check($bdc, $_POST["format"]);

        }

        $model->read($bdc, $entityManager);

        include(__DIR__."/../../../app/views/allocine/manage.php");

    }

    public function boxView($formatBox, $model, $picture) {

        return $model->box($formatBox, $picture);

    }






}