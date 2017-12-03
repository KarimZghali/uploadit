<!DOCTYPE html>
<?php

use UPLOADIT\Controller\Media\AllocineController;
use UPLOADIT\Controller\Media\AdmooveController;
use UPLOADIT\Controller\Media\NrjController;
use UPLOADIT\Controller\Media\AuthBdcController;

require "./../vendor/autoload.php";

try {


    $bdc = (string) filter_input(INPUT_GET, "bdc");
    $media = (string) filter_input(INPUT_GET, "media");
    $failAuth = (boolean) filter_input(INPUT_GET, "failAuth");


    if (($bdc) && !($media)) {
        $failAuth = true;
    }


        $route = [
            "allocine" => AllocineController::class,
            "admoove"  => AdmooveController::class,
            "nrj"      => NrjController::class,
           // "authBdc"  => AuthBdcController::class,
        ];


        foreach ($route as $routeValue => $className) {

            if ($media == $routeValue) {
                $controller = new $className;
                $response = $controller->{'manage'}($bdc, $media);
                break;
            }

        }

        if (!isset($controller)) {
            $controller = new AuthBdcController;
            $response = $controller->manage($failAuth);
        }

} catch(throwable $e) {
    echo '<h1>ERROR : </h1>'.(string) $e;
}

?>


