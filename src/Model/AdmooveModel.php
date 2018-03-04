<?php

namespace UPLOADIT\Model;

use UPLOADIT\Entity\Campagne;
use UPLOADIT\Entity\AdmooveVague1;
use UPLOADIT\Entity\FormatAllocineHabillageTablette;
use UPLOADIT\Entity\FormatAllocineHabillagePc;
use UPLOADIT\Entity\FormatAllocineDemipage;
use UPLOADIT\Entity\FormatAllocineHabillageMobile;
use UPLOADIT\Model\Media;

class AdmooveModel extends Media
{

    private $pictureFormat1;
    private $pictureFormat2;
    public static $format1 = "Interstitiel";
    public static $format2 = "Bannière Admoove";


    /**
     * @return mixed
     */
    public function getPictureFormat1()
    {
        return $this->pictureFormat1;
    }

    /**
     * @param mixed $pictureFormat1
     */
    public function setPictureFormat1($pictureFormat1)
    {
        $this->pictureFormat1 = $pictureFormat1;
    }

    /**
     * @return mixed
     */
    public function getPictureFormat2()
    {
        return $this->pictureFormat2;
    }

    /**
     * @param mixed $pictureFormat2
     */
    public function setPictureFormat2($pictureFormat2)
    {
        $this->pictureFormat2 = $pictureFormat2;
    }



    // Recover media data
    public function readMedia($bdc, $entityManager, $format) {

        $formatString = (string)$format;
        var_dump($formatString);


        $campagne = $entityManager
            ->getRepository(Campagne::class)
            ->findOneBy(["numberBdcCampagne" => $bdc]);

        $admooveVague1 = $entityManager
            ->getRepository(AdmooveVague1::class)
            ->findOneBy(["idCampagne" => $campagne->getIdCampagne()]);

        if ($format === "Bannière") {

            $format = $entityManager
                ->getRepository(FormatAllocineHabillageMobile::class)
                ->findOneBy(["idFormatAllocineHabillageMobile" => 1]);

            $this->setPictureExample($formatString);

        } else {

            $format = $entityManager
                ->getRepository(FormatAllocineHabillagePc::class)
                ->findOneBy(["idFormatAllocineHabillagePc" => 1]);

            $this->setPictureExample("Habillge-Pc");

        }

        $this->setHeight($format->getHeight());
        $this->setWidth($format->getWidth());
        $this->setWeight(($format->getWeight()) / 100);
        $this->setPictureFormat1($admooveVague1->getInterstitielAdmooveVague1());
        $this->setPictureFormat2($admooveVague1->getBanniereAdmooveVague1());

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

    // Add an uploaded image to the DB
    public function addPicture($fileName, $entityManager, $bdc, $formatSetBdd)
    {

        $idCampagne = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

        $addPictures = $entityManager->getRepository(AllocineVague1::class)->findOneBy(["idCampagne" => $idCampagne]);

        $setFormat = "set".$formatSetBdd."Vague1";

        $addPictures->$setFormat($fileName);

        $entityManager->flush();

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

}