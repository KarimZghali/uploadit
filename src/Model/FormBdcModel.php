<?php

namespace UPLOADIT\Model;


class FormBdcModel {

    public function form($failAuth) {

        include(__DIR__."/../../app/views/formBdc/formBdc.php");
    }

}