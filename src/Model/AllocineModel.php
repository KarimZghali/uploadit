<?php
namespace UPLOADIT\Model;
use function Composer\Autoload\includeFile;
use UPLOADIT\Entity\Campagne;

class AllocineModel
{


    public function check($bdc, $entityManager)
    {

       // $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../bootstrap.php']);

        $GetCampagne = $entityManager->getRepository(Campagne::class);

        if (!$GetCampagne->findBy(["numberBdcCampagne" => $bdc])) {

            var_dump('Nouveau ! Création d un new BDC');

            $setCampagne = new Campagne();

            $setCampagne->setNumberBdcCampagne($bdc);
            $entityManager->persist($setCampagne);
            $entityManager->flush();
        }

    }

    public function read($bdc, $entityManager)
    {
        $campagne = $entityManager
            ->getRepository(Campagne::class)
            ->findOneBy(["numberBdcCampagne" => $bdc]);


       include(__DIR__."/../../app/views/allocine/manage.php");

    }

}