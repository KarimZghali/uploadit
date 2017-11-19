<!DOCTYPE html>
<?php

use UPLOADIT\Controller\Media\AllocineController;
use UPLOADIT\Controller\Media\AdmooveController;
use UPLOADIT\Controller\Media\NrjController;
use UPLOADIT\Controller\Media\AuthBdcController;

require "./../vendor/autoload.php";

try {

//    if (filter_input(INPUT_POST, "bdc") && (filter_input(INPUT_POST, "media")))

    $bdc = (string) filter_input(INPUT_GET, "bdc");
    $media = (string) filter_input(INPUT_GET, "media");


//    $formBdc = (string) filter_input(INPUT_POST, "formBdc");
//    $formMedia = (string) filter_input(INPUT_POST, "formMedia");


        $route = [
            "allocine" => AllocineController::class,
            "admoove"  => AdmooveController::class,
            "nrj"      => NrjController::class,
            "authBdc" => AuthBdcController::class,
        ];


        foreach ($route as $routeValue => $className) {

            if ($media == $routeValue) {
                $controller = new $className;
                $response = $controller->{'manage'}($bdc);
                break;
            }

        }

        if (!isset($controller)) {
//            $controller = new AuthBdcController;
//            $response = $controller->manage($formBdc);
            var_dump('error');
        }





} catch(throwable $e) {
    echo '<h1>ERROR : </h1>'.(string) $e;
}

?>


