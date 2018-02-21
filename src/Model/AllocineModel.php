<?php
namespace UPLOADIT\Model;
use function Composer\Autoload\includeFile;
use UPLOADIT\Entity\AdmooveVague1;
use UPLOADIT\Entity\Campagne;
use UPLOADIT\Entity\AllocineVague1;
use UPLOADIT\Entity\AllocineVague2;
use UPLOADIT\Entity\AllocineVague3;
use UPLOADIT\Entity\AllocineVague4;
use UPLOADIT\Entity\NrjVague1;
use UPLOADIT\Entity\Commercial;
use UPLOADIT\Entity\Customer;
use UPLOADIT\Entity\FormatAllocineHabillageTablette;
use UPLOADIT\Entity\FormatAllocineHabillagePc;
use UPLOADIT\Entity\FormatAllocineDemipage;
use UPLOADIT\Entity\FormatAllocineHabillageMobile;



class AllocineModel
{
    private $name;
    private $bdc;
    private $width;
    private $height;
    private $Weight;
    private $gif;
    private $txtZone;
    private $compatibility;
    private $customer;
    private $commercial;
    private $dateStart;
    private $dateEnd;
    private $habillagePcVague1;
    private $habillageTabletteVague1;
    private $habillageMobileVague1;
    private $demiPageVague1;
    private $pictureExample;
    private $listCommercial;


    /**
     * @return mixed
     */
    public function getCommercial()
    {
        return $this->commercial;
    }

    /**
     * @param mixed $commercial
     */
    public function setCommercial($commercial)
    {
        $this->commercial = $commercial;
    }

    /**
     * @return mixed
     */
    public function getListCommercial()
    {
        return $this->listCommercial;
    }

    /**
     * @param mixed $listCommercial
     */
    public function setListCommercial($listCommercial)
    {
        $this->listCommercial = $listCommercial;
    }

    /**
     * @return mixed
     */
    public function getPictureExample()
    {
        return $this->pictureExample;
    }

    /**
     * @param mixed $pictureExample
     */
    public function setPictureExample($pictureExample)
    {
        $this->pictureExample = $pictureExample;
    }

    /**
     * @return mixed
     */
    public function getHabillageMobileVague1()
    {
        return $this->habillageMobileVague1;
    }

    /**
     * @param mixed $habillageMobileVague1
     */
    public function setHabillageMobileVague1($habillageMobileVague1)
    {
        $this->habillageMobileVague1 = $habillageMobileVague1;
    }

    /**
     * @return mixed
     */
    public function getDemiPageVague1()
    {
        return $this->demiPageVague1;
    }

    /**
     * @param mixed $demiPageVague1
     */
    public function setDemiPageVague1($demiPageVague1)
    {
        $this->demiPageVague1 = $demiPageVague1;
    }

    /**
     * @return mixed
     */
    public function getHabillageTabletteVague1()
    {
        return $this->habillageTabletteVague1;
    }

    /**
     * @param mixed $habillageTabletteVague1
     */
    public function setHabillageTabletteVague1($habillageTabletteVague1)
    {
        $this->habillageTabletteVague1 = $habillageTabletteVague1;
    }

    /**
     * @return mixed
     */
    public function getHabillagePcVague1()
    {
        return $this->habillagePcVague1;
    }

    /**
     * @param mixed $habillagePcVague1
     */
    public function setHabillagePcVague1($habillagePcVague1)
    {
        $this->habillagePcVague1 = $habillagePcVague1;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBdc()
    {
        return $this->bdc;
    }

    /**
     * @param mixed $bdc
     */
    public function setBdc($bdc)
    {
        $this->bdc = $bdc;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->Weight;
    }

    /**
     * @param mixed $size
     */
    public function setWeight($Weight)
    {
        $this->Weight = $Weight;
    }

    /**
     * @return mixed
     */
    public function getGif()
    {
        return $this->gif;
    }

    /**
     * @param mixed $gif
     */
    public function setGif($gif)
    {
        $this->gif = $gif;
    }

    /**
     * @return mixed
     */
    public function getTxtZone()
    {
        return $this->txtZone;
    }

    /**
     * @param mixed $txtZone
     */
    public function setTxtZone($txtZone)
    {
        $this->txtZone = $txtZone;
    }

    /**
     * @return mixed
     */
    public function getCompatibility()
    {
        return $this->compatibility;
    }

    /**
     * @param mixed $compatibility
     */
    public function setCompatibility($compatibility)
    {
        $this->compatibility = $compatibility;
    }


    // Delete an image
    public function deletePicture($formatSetBdd, $bdc, $entityManager) {

        // Search the campaign id with the BDC
        $idCampagne = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

        $DeletePicture = $entityManager->getRepository(AllocineVague1::class)->findOneBy(["idCampagne" => $idCampagne]);

        $setFormat = "set".$formatSetBdd."Vague1";

        $DeletePicture->$setFormat(null);

        $entityManager->flush();
    }

    // Check if the campaign already exists in the DB
    public function checkBdcData($bdc, $entityManager)
    {

//         var_dump($entityManager);

        $GetCampagne = $entityManager->getRepository(Campagne::class);
     //   $GetVague1 = $entityManager->getRepository(AllocineVague1::class);

        if (!$GetCampagne->findBy(["numberBdcCampagne" => $bdc])) {

            $setCampagne = new Campagne();
            $setVague1 = new AllocineVague1();

            $setCampagne->setNumberBdcCampagne($bdc);
            $entityManager->persist($setCampagne);
            $entityManager->flush();


            $entityManager->persist($setVague1);


          //  $this->addPicture("test", $entityManager);

            var_dump('test1');

            $this->addMediaBdc($entityManager, $bdc);


           // die("End");

        }

    }

    // Add new media to the campaign
    public function addMediaBdc($entityManager, $bdc) {




        $campagne = $entityManager->getRepository(Campagne::class);
        $vague1 = new AllocineVague1();

        $campagneId = $campagne->find(28);

//         var_dump($campagneId);

        $vague1->setIdCampagne($campagneId);



        $entityManager->persist($vague1);

        $entityManager->flush();

//         die("End");
//         exit;

    }

    // Recover campaign data
    public function read($bdc, $entityManager, $format)
    {
        $formatString = (string)$format;

        $campagne = $entityManager
            ->getRepository(Campagne::class)
            ->findOneBy(["numberBdcCampagne" => $bdc]);


        $commercialList = $entityManager
            ->getRepository(Commercial::class)
            ->findBy(array(), array('nameCommercial' => 'ASC'));


       // var_dump($commercialList);

        $allocineVague1 = $entityManager
            ->getRepository(AllocineVague1::class)
            ->findOneBy(["idCampagne" => $campagne->getIdCampagne()]);

//        $allocineVague1 = $entityManager
//            ->getRepository(AllocineVague1::class)
//            ->findOneBy(["idCampagne" => $campagne->getIdCampagne()]);

//        if ( isset($_GET["format"]) ) {

        if ($format === "Habillage-smartphone") {

            $format = $entityManager
                ->getRepository(FormatAllocineHabillageMobile::class)
                ->findOneBy(["idFormatAllocineHabillageMobile" => 1]);


            $this->setPictureExample($formatString);


        } else if ($format === "Habillage-tablette") {

            $format = $entityManager
                ->getRepository(FormatAllocineHabillageTablette::class)
                ->findOneBy(["idFormatAllocineHabillageTablette" => 1]);


            $this->setPictureExample($formatString);


        } else if ($format === "Demi-page") {

            $format = $entityManager
                ->getRepository(FormatAllocineDemipage::class)
                ->findOneBy(["idFormatAllocineDemipage" => 1]);

            $this->setPictureExample($formatString);


        } else {

            $format = $entityManager
                ->getRepository(FormatAllocineHabillagePc::class)
                ->findOneBy(["idFormatAllocineHabillagePc" => 1]);

            $this->setPictureExample("Habillge-Pc");

        }
//        }

        $this->setBdc($campagne->getNumberBdcCampagne());
        $this->setHeight($format->getHeight());
        $this->setWidth($format->getWidth());
        $this->setWeight(($format->getWeight()) / 100);
        $this->setHabillageTabletteVague1($allocineVague1->getHabillageTabletteAllocineVague1());
        $this->setHabillagePCVague1($allocineVague1->getHabillagePcAllocineVague1());
        $this->setHabillageMobileVague1($allocineVague1->getHabillageMobileAllocineVague1());
        $this->setDemiPageVague1($allocineVague1->getDemipageAllocineVague1());
        $this->setListCommercial($commercialList);

        if ($campagne->getIdCommercial() == null) {
            $this->setCommercial(212);
        } else {
            $this->setCommercial($campagne->getIdCommercial()->getIdCommercial());
        }



        if ($format->gettextZone() == false) {
            $this->setTxtZone("non");
        } else {
            $this->setTxtZone("oui");
        }

        if ($format->getGif() == false) {
            $this . $this->setGif("jpeg / jpg / png / gif");
        } else {
            $this->setGif("jpeg / jpg / png");
        }

    }

    //Add a customer to the campaign
    public function addCustomer($bdc, $emailCustomer, $entityManager)
    {
        $getCustomer = $entityManager->getRepository(Customer::class);
        $customer = new Customer();
        $campaign = new Campagne();


        if (!$getCustomer->findBy(["emailCustomer" => $emailCustomer])) {

            $customer->setEmailCustomer($emailCustomer);
            $entityManager->persist($customer);
            // $entityManager->flush();

        }


        $campaign->setIdCustomer($getCustomer->findOneBy(["emailCustomer" => $emailCustomer]))
            ->findOneBy(["numberBdcCampagne" => $bdc]);


//        $campaign->setIdCustomer( $getCustomer->findOneBy(["emailCustomer" => $emailCustomer ]) )
//            ->find($bdc );

//        $campaign->setIdCustomer(
//            $entityManager
//            ->getRepository(Customer::class)
//            ->findOneBy(["idCustomer" => 1 ])
//        )->findOneBy(["numberBdcCampagne" => $bdc ]);

        $entityManager->persist($campaign);
        $entityManager->flush();


    }

    // Add an uploaded image to the DB
    public function addPicture($fileName, $entityManager, $bdc, $formatSetBdd)
    {
      //  $GetCampagne = $entityManager->getRepository(Campagne::class);
      //  $campagne = $GetAllocineV1->find(13);



        // Rechercher le l'id de la campagne grace à BDC
        $idCampagne = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

        $addPictures = $entityManager->getRepository(AllocineVague1::class)->findOneBy(["idCampagne" => $idCampagne]);

        $setFormat = "set".$formatSetBdd."Vague1";

        $addPictures->$setFormat($fileName);

        $entityManager->flush();

    }

    // Add a commercial to the campaign
    public function AddCommercial($bdc, $entityManager, $commercialId)
    {

//         var_dump($commercialId);

        // Search campaign ID with BDC
        $getCampagne = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

//         var_dump($getCampagne);

        $getCommercial = $entityManager->getRepository(Commercial::class)->find($commercialId);

//         var_dump($getCommercial);

        $getCampagne->setIdCommercial($getCommercial);

        $entityManager->flush();
    }
}