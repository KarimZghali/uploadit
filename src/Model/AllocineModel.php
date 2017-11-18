<?php
namespace UPLOADIT\Model;
use UPLOADIT\Entity\Campagne;

class AllocineModel
{


    public function check($bdc)
    {

        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../bootstrap.php']);

        $GetCampagne = $entityManager->getRepository(Campagne::class);

        // var_dump($GetCampagne);

        if (!$GetCampagne->findBy(["numberBdcCampagne" => $bdc])) {

            $setCampagne = new Campagne();

            $setCampagne->setNumberBdcCampagne($bdc);
            $entityManager->persist($setCampagne);
            $entityManager->flush();
        }

        return $GetCampagne;

    }

    public function read($bdc, $campagne)
    {

       //  $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../bootstrap.php']);



        exit;

    }

}