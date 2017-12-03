<?php
namespace UPLOADIT\Model;
use function Composer\Autoload\includeFile;
use UPLOADIT\Entity\Campagne;

class AllocineModel
{


    public function checkBdcPattern($bdc)
    {

        $pattern = '/^[wW][1-9][0-9]{4}$/';

        if (preg_match($pattern,$bdc)) {
//            var_dump('BDC OK !');

        } else {

//            var_dump('BAD bdc!');
            header('location: ./?failAuth=true');
        }

    }

    public function checkBdcData($bdc, $entityManager)
    {

       // $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '/../../bootstrap.php']);

        $GetCampagne = $entityManager->getRepository(Campagne::class);

        if (!$GetCampagne->findBy(["numberBdcCampagne" => $bdc])) {

            var_dump('Nouveau ! Création d un new BDC');

            $setCampagne = new Campagne();

            $setCampagne->setNumberBdcCampagne($bdc);
            $entityManager->persist($setCampagne);
            $entityManager->flush();
        } else {
            var_dump('BDC Déjà existant');
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