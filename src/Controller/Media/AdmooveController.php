<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 18/11/2017
 * Time: 12:13
 */

namespace UPLOADIT\Controller\Media;
use UPLOADIT\Model\AllocineModel;


class AdmooveController
{

    public function manage() {

    $model = new AllocineModel();

    $model->creat();

    }

}