<!DOCTYPE html>
<?php

use UPLOADIT\Controller\Admin\AllocineController;
use UPLOADIT\Controller\Admin\AdmooveController;
use UPLOADIT\Controller\Admin\NrjController;

require "./../vendor/autoload.php";

try {

    if (filter_input(INPUT_POST, "bdc") && (filter_input(INPUT_POST, "media")))
    {

        $bdc = (string) filter_input(INPUT_POST, "bdc");
        $media = (string) filter_input(INPUT_POST, "media");


        $route = [
            "allocine" => AllocineController::class,
            "admoove"  => AdmooveController::class,
            "nrj"      => NrjController::class,
        ];


        foreach ($route as $routeValue => $className) {

            if ($media == $routeValue) {

                $controller = new $className;

                $response = $controller->{'manage'}($bdc);
                break;
            }

        }

    }

} catch(throwable $e) {
    echo '<h1>ERROR : </h1>'.(string) $e;
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="">
    <label for="bdc">Bon de commande</label>
    <input type="text" name="bdc" placeholder="Entrez ici votre numéro de bon de commande">
    <br>
    Quelle offre avez-vous souscit ?
    <input type="radio" id="allocine" name="media" value="allocine">
    <label for="allocine">Allociné</label>

    <input type="radio" id="admoove" name="media" value="admoove">
    <label for="admoove">AdMoove</label>

    <input type="radio" id="nrj" name="media" value="nrj">
    <label for="nrj">Site(s) groupe NRJ</label>
    <br>
    <input type="submit" value="Envoyer"/>

</form>
</body>
</html>
