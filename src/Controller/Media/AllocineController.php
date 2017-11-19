<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 18/11/2017
 * Time: 12:13
 */

namespace UPLOADIT\Controller\Media;
use UPLOADIT\Model\AllocineModel;


class AllocineController
{

    public function manage($bdc) {
        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../../bootstrap.php']);

        $model = new AllocineModel();

        $model->check($bdc, $entityManager);

        $model->read($bdc, $entityManager);

    }

}