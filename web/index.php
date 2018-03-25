<?php

use UPLOADIT\Controller\Media\AllocineController;
use UPLOADIT\Controller\Media\AdmooveController;
use UPLOADIT\Controller\Media\NrjController;
use UPLOADIT\Controller\Media\AuthBdcController;
use UPLOADIT\Controller\Admin\AdminControler;

require "./../vendor/autoload.php";


$entityManager = require __DIR__ . "/../bootstrap.php";

try {

    //recovering data from the URL
    $bdc      = (string) filter_input(INPUT_GET, "bdc");
    $media    = (string) filter_input(INPUT_GET, "media");
    $failAuth = (boolean)filter_input(INPUT_GET, "failAuth");

    $emailCustomer = (string) filter_input(INPUT_POST, "email-customer");

    //If the bdc is informed but not the media
    if (($bdc) && !($media)) {
        $failAuth = true;
    }

//    $route = [
//        "allocine" => AllocineController::class,
//        "admoove"  => AdmooveController::class,
//        "nrj"      => NrjController::class,
//        "admin"    => AdminControler::class,
//    ];

    $route = [
        "Allocine" => AllocineController::class,
        "Admoove"  => AllocineController::class,
        "Nrj"      => NrjController::class,
        "Admin"    => AdminControler::class,
    ];

    // ROUTER - Searching for correspondence with URL data
    foreach ($route as $routeValue => $className) {

        //MATCHING
        if ($media == $routeValue) {
            $controller = new $className;

            //DISPATCHING
            $response = $controller->{'manage'}($bdc, $media, $emailCustomer);
            break;
        }
    }

    // if no correspondence with the URL data
    if (!isset($controller)) {
        $controller = new AuthBdcController;
        $response = $controller->manage($failAuth);
    }

} catch(throwable $e) {
    header("HTTP/1.1 500 Internal Server Error");
    echo '<h1>!ERROR : </h1>'.(string) $e;
}

?>


