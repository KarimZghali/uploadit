<?php

namespace UPLOADIT\Model;


class FormBdcModel {

    public function form($failAuth) {

        if ($failAuth) {
            var_dump('Votre numéro de BDC ne correspond à aucune camapgne 
            ou vous n\'avez pas selectionné un des trois médias.');
        }

        include(__DIR__."/../../app/views/formBdc/formBdc.php");
    }

}