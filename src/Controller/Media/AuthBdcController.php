<?php

namespace UPLOADIT\Controller\Media;
use UPLOADIT\Model\FormBdcModel;

class AuthBdcController {

    public function manage($failAuth)
    {

       // var_dump('Controller Auth');

        $model = new FormBdcModel;
        $model->form($failAuth);

    }


}


