<?php
namespace UPLOADIT\Model;
use function Composer\Autoload\includeFile;
use UPLOADIT\Entity\Campagne;
use UPLOADIT\Entity\AllocineVague1;
use UPLOADIT\Entity\Commercial;
use UPLOADIT\Entity\FormatAllocineHabillageTablette;

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

//    private $technicalSpecifications = [
//        "txtZone" => "",
//        "format" => "",
//        "height" => 0,
//        "width" => 0,
//        "size" => 0,
//    ];


    /**
     * AllocineModel constructor.
     * @param $name
     * @param $bdc
     * @param $width
     * @param $height
     * @param $size
     * @param $gif
     * @param $txtZone
     * @param $compatibility
     */
//    public function
//    __construct($name, $bdc, $width, $height, $size, $gif, $txtZone, $compatibility)
//    {
//        $this->name = $name;
//        $this->bdc = $bdc;
//        $this->width = $width;
//        $this->height = $height;
//        $this->size = $size;
//        $this->gif = $gif;
//        $this->txtZone = $txtZone;
//        $this->compatibility = $compatibility;
//    }

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
          //  var_dump('BDC Déjà existant');
        }

    }

    public function read($bdc, $entityManager)
    {
        $campagne = $entityManager
            ->getRepository(Campagne::class)
            ->findOneBy(["numberBdcCampagne" => $bdc]);

        $commercialList = $entityManager
            ->getRepository(Commercial::class)
            ->findAll();

        $allocineVague1 = $entityManager
            ->getRepository(AllocineVague1::class)
            ->findOneBy(["idCampagne" => $campagne->getIdCampagne()]);

        $allocineVague1 = $entityManager
            ->getRepository(AllocineVague1::class)
            ->findOneBy(["idCampagne" => $campagne->getIdCampagne()]);

        $formatAllocinéHT = $entityManager
            ->getRepository(FormatAllocineHabillageTablette::class)
            ->findOneBy(["idFormatAllocineHabillageTablette" => 1 ]);

        $this->setBdc($campagne->getNumberBdcCampagne());
        $this->setHeight($formatAllocinéHT->getHeight());
        $this->setWidth($formatAllocinéHT->getWidth());
        $this->setWeight( ($formatAllocinéHT->getWeight())/100 );
        $this->setHabillageTabletteVague1($allocineVague1->getHabillageTabletteAllocineVague1());



        if ($formatAllocinéHT->gettextZone() == false) {
            $this->setTxtZone("non");
        } else {
            $this->setTxtZone("oui");
        }

        if ($formatAllocinéHT->getGif() == false ) {
            $this.$this->setGif("jpeg / jpg / png / gif");
        } else {
            $this->setGif("jpeg / jpg / png");
        }


       // var_dump($allocineVague1);


     //  include(__DIR__."/../../app/views/allocine/manage.php");

    }

}