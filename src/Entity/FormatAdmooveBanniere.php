<?php

namespace UPLOADIT\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormatAdmooveBanniere
 *
 * @ORM\Table(name="format_admoove_banniere")
 * @ORM\Entity
 */
class FormatAdmooveBanniere
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_format_admoove_banniere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormatAdmooveBanniere;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=false)
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=false)
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=false)
     */
    private $width;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gif", type="boolean", nullable=false)
     */
    private $gif;

    /**
     * @var boolean
     *
     * @ORM\Column(name="text_zone", type="boolean", nullable=false)
     */
    private $textZone;



    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return FormatAdmooveBanniere
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return FormatAdmooveBanniere
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return FormatAdmooveBanniere
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set gif
     *
     * @param boolean $gif
     *
     * @return FormatAdmooveBanniere
     */
    public function setGif($gif)
    {
        $this->gif = $gif;

        return $this;
    }

    /**
     * Get gif
     *
     * @return boolean
     */
    public function getGif()
    {
        return $this->gif;
    }

    /**
     * Set textZone
     *
     * @param boolean $textZone
     *
     * @return FormatAdmooveBanniere
     */
    public function setTextZone($textZone)
    {
        $this->textZone = $textZone;

        return $this;
    }

    /**
     * Get textZone
     *
     * @return boolean
     */
    public function getTextZone()
    {
        return $this->textZone;
    }

    /**
     * Get idFormatAdmooveBanniere
     *
     * @return integer
     */
    public function getIdFormatAdmooveBanniere()
    {
        return $this->idFormatAdmooveBanniere;
    }
}
