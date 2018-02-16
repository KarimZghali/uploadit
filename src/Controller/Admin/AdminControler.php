<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 21/01/2018
 * Time: 14:59
 */

namespace UPLOADIT\Controller\Admin;
use UPLOADIT\Model\AdminModel;

class AdminControler
{

    function manage()
    {
        var_dump('Admin Controler');

        $adminModel = new AdminModel();

        $adminModel->updateTechnicalSpecifications();

    }


}