<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 18/11/2017
 * Time: 12:13
 */

namespace UPLOADIT\Controller\Admin;
use UPLOADIT\Model\AllocineModel;


class AllocineController
{

    public function manage($bdc) {




        $model = new AllocineModel();

        $campagne = $model->check($bdc);

        $model->read($bdc, $campagne);

    }

}