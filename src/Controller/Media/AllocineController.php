<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 18/11/2017
 * Time: 12:13
 */

namespace UPLOADIT\Controller\Media;
use UPLOADIT\Model\AllocineModel;
;use UPLOADIT\Controller\Controller;


class AllocineController extends Controller
{

    public function manage($bdc, $media) {

        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../../bootstrap.php']);

        $model = new AllocineModel();

        $model->checkBdcPattern($bdc);

        $model->checkBdcData($bdc, $entityManager);

        $model->read($bdc, $entityManager);

        include(__DIR__."/../../../app/views/allocine/manage.php");

    }


}