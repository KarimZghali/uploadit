<?php

namespace UPLOADIT\Controller\Admin;
use UPLOADIT\Model\FormBdcModel;

class AuthBdcController {

    public function  manage($Bdc)
    {

        var_dump('Controller Auth');

        if($Bdc) {

            $pattern = '/^[wW][1-9][0-9]{4}/';

            if (preg_match($pattern,$Bdc)) {
                var_dump('BDC OK');
                exit;
                header('location: ./?media=allocine&bdc=w11111');

            }

        }

        $model = new FormBdcModel;
        $model->form();





    }


}


