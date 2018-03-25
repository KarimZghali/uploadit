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
use UPLOADIT\Model\Media;



class AllocineModel extends Media
{

    private $dateStart;
    private $dateEnd;
    private $pictureFormat1;
    private $pictureFormat2;
    private $pictureFormat3;
    private $pictureFormat4;
    public static $format1 = "Habillage-Pc";
    public static $format2 = "Habillage-smartphone";
    public static $format3 = "Habillage-tablette";
    public static $format4 = "Demi-page";


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

    /**
     * @return mixed
     */
    public function getPictureFormat3()
    {
        return $this->pictureFormat3;
    }

    /**
     * @param mixed $pictureFormat3
     */
    public function setPictureFormat3($pictureFormat3)
    {
        $this->pictureFormat3 = $pictureFormat3;
    }

    /**
     * @return mixed
     */
    public function getPictureFormat4()
    {
        return $this->pictureFormat4;
    }

    /**
     * @param mixed $pictureFormat4
     */
    public function setPictureFormat4($pictureFormat4)
    {
        $this->pictureFormat4 = $pictureFormat4;
    }




    // Recover media data
    public function readMedia($bdc, $entityManager, $format) {

        $formatString = (string)$format;

        $campagne = $entityManager
            ->getRepository(Campagne::class)
            ->findOneBy(["numberBdcCampagne" => $bdc]);


        $allocineVague1 = $entityManager
            ->getRepository(AllocineVague1::class)
            ->findOneBy(["idCampagne" => $campagne->getIdCampagne()]);


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

        $this->setHeight($format->getHeight());
        $this->setWidth($format->getWidth());
        $this->setWeight(($format->getWeight()) / 100);
        $this->setPictureFormat3($allocineVague1->getHabillageTabletteAllocineVague1());
        $this->setPictureFormat1($allocineVague1->getHabillagePcAllocineVague1());
        $this->setPictureFormat2($allocineVague1->getHabillageMobileAllocineVague1());
        $this->setPictureFormat4($allocineVague1->getDemipageAllocineVague1());

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
    public function addPicture($fileName, $entityManager, $bdc, $formatSetBdd, $format)
    {

        $idCampagne = $entityManager->getRepository(Campagne::class)->findOneBy(["numberBdcCampagne" => $bdc]);

        $addPictures = $entityManager->getRepository(AllocineVague1::class)->findOneBy(["idCampagne" => $idCampagne]);

        $setFormat = "set".$formatSetBdd."Vague1";

        $addPictures->$setFormat($fileName);

        $entityManager->flush();

        $this->readMedia($bdc, $entityManager, $format);
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