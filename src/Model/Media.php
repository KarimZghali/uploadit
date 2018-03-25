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


abstract class Media
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
    private $pictureExample;
    private $listCommercial;

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param mixed $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

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


    // Check if the campaign already exists in the DB
    public function checkBdcData($bdc, $entityManager)
    {
        $GetCampagne = $entityManager->getRepository(Campagne::class);

        if (!$GetCampagne->findBy(["numberBdcCampagne" => $bdc])) {

            $campagne = new Campagne();

            $campagne->setNumberBdcCampagne($bdc);
            $entityManager->persist($campagne);
            $entityManager->flush();

            $this->addMediaBdc($entityManager, $campagne, $bdc);
        }
    }

    // Add new media to the campaign
    public function addMediaBdc($entityManager, $campagne, $bdc) {

        $allocineVague1 = new AllocineVague1();
        $allocineVague2 = new AllocineVague2();
        $allocineVague3 = new AllocineVague3();
        $allocineVague4 = new AllocineVague4();
        $admooveVague1  = new AdmooveVague1();
        $nrjVague1      = new NrjVague1();


        $allocineVague1->setIdCampagne($campagne);
        $allocineVague2->setIdCampagne($campagne);
        $allocineVague3->setIdCampagne($campagne);
        $allocineVague4->setIdCampagne($campagne);
        $admooveVague1->setIdCampagne($campagne);
        $nrjVague1->setIdCampagne($campagne);

        $entityManager->persist($allocineVague1);
        $entityManager->persist($allocineVague2);
        $entityManager->persist($allocineVague3);
        $entityManager->persist($allocineVague4);
        $entityManager->persist($admooveVague1);
        $entityManager->persist($nrjVague1);

        $entityManager->flush();
    }

    // Recover campaign data
    public function readCampaign($bdc, $entityManager)
    {

        $campagne = $entityManager
            ->getRepository(Campagne::class)
            ->findOneBy(["numberBdcCampagne" => $bdc]);


        $commercialList = $entityManager
            ->getRepository(Commercial::class)
            ->findBy(array(), array('nameCommercial' => 'ASC'));


        $this->setBdc($campagne->getNumberBdcCampagne());
        $this->setListCommercial($commercialList);


        if ($campagne->getIdCommercial() == null) {
            $this->setCommercial(212);
        } else {
            $this->setCommercial($campagne->getIdCommercial()->getIdCommercial());
        }


        if ($campagne->getIdCustomer() == null) {
            $this->setCustomer("");
        } else {
            $customer = $entityManager->getRepository(Customer::class)->findOneBy(["idCustomer"=>$campagne->getIdCustomer()]);
            $this->setCustomer($customer->getEmailCustomer());
        }

    }

    //Add a customer to the campaign
    public function addCustomer($bdc, $emailCustomer, $entityManager)
    {
        $RepositoryCustomer = $entityManager->getRepository(Customer::class);
        $customer = new Customer();

        //check if the email address already exists in the DB
        if (!$RepositoryCustomer->findBy(["emailCustomer" => $emailCustomer])) {

            $customer->setEmailCustomer($emailCustomer);
            $entityManager->persist($customer);
            $entityManager->flush();
        }

        $campaign = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

        $customer = $entityManager->getRepository(Customer::class)->findOneBy(["emailCustomer" => $emailCustomer]);

        $campaign->setIdCustomer($customer);

        $entityManager->flush();
    }

    // Add a commercial to the campaign
    public function AddCommercial($bdc, $entityManager, $commercialId)
    {
        // Search campaign ID with BDC
        $campagne = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

        $commercial = $entityManager->getRepository(Commercial::class)->find($commercialId);

        $campagne->setIdCommercial($commercial);

        $entityManager->flush();
    }

    // Add an uploaded image to the DB
    abstract function addPicture($fileName, $entityManager, $bdc, $formatSetBdd, $format);

    // Recover media data
    abstract function readMedia($bdc, $entityManager, $format);

    // Delete an image
    abstract function deletePicture($formatSetBdd, $bdc, $entityManager);

}