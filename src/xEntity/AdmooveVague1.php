<?php

namespace UPLOADIT\Entity;
use UPLOADIT\Entity\Campagne;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmooveVague1
 *
 * @ORM\Table(name="admoove_vague1", indexes={@ORM\Index(name="id_campagne", columns={"id_campagne"})})
 * @ORM\Entity
 */
class AdmooveVague1
{
    /**
     * @var string
     *
     * @ORM\Column(name="interstitiel_admoove_vague1", type="string", length=50, nullable=true)
     */
    private $interstitielAdmooveVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="banniere_admoove_vague1", type="string", length=50, nullable=true)
     */
    private $banniereAdmooveVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="pige_admoove_vague1", type="string", length=50, nullable=true)
     */
    private $pigeAdmooveVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="bilan_admoove_vague1", type="string", length=50, nullable=true)
     */
    private $bilanAdmooveVague1;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_admoove_vague1", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdmooveVague1;

    /**
     * @var \Campagne
     *
     * @ORM\ManyToOne(targetEntity="Campagne", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_campagne", referencedColumnName="id_campagne")
     * })
     */
    private $idCampagne;



    /**
     * Set interstitielAdmooveVague1
     *
     * @param string $interstitielAdmooveVague1
     *
     * @return AdmooveVague1
     */
    public function setInterstitielAdmooveVague1($interstitielAdmooveVague1)
    {
        $this->interstitielAdmooveVague1 = $interstitielAdmooveVague1;

        return $this;
    }

    /**
     * Get interstitielAdmooveVague1
     *
     * @return string
     */
    public function getInterstitielAdmooveVague1()
    {
        return $this->interstitielAdmooveVague1;
    }

    /**
     * Set banniereAdmooveVague1
     *
     * @param string $banniereAdmooveVague1
     *
     * @return AdmooveVague1
     */
    public function setBanniereAdmooveVague1($banniereAdmooveVague1)
    {
        $this->banniereAdmooveVague1 = $banniereAdmooveVague1;

        return $this;
    }

    /**
     * Get banniereAdmooveVague1
     *
     * @return string
     */
    public function getBanniereAdmooveVague1()
    {
        return $this->banniereAdmooveVague1;
    }

    /**
     * Set pigeAdmooveVague1
     *
     * @param string $pigeAdmooveVague1
     *
     * @return AdmooveVague1
     */
    public function setPigeAdmooveVague1($pigeAdmooveVague1)
    {
        $this->pigeAdmooveVague1 = $pigeAdmooveVague1;

        return $this;
    }

    /**
     * Get pigeAdmooveVague1
     *
     * @return string
     */
    public function getPigeAdmooveVague1()
    {
        return $this->pigeAdmooveVague1;
    }

    /**
     * Set bilanAdmooveVague1
     *
     * @param string $bilanAdmooveVague1
     *
     * @return AdmooveVague1
     */
    public function setBilanAdmooveVague1($bilanAdmooveVague1)
    {
        $this->bilanAdmooveVague1 = $bilanAdmooveVague1;

        return $this;
    }

    /**
     * Get bilanAdmooveVague1
     *
     * @return string
     */
    public function getBilanAdmooveVague1()
    {
        return $this->bilanAdmooveVague1;
    }

    /**
     * Get idAdmooveVague1
     *
     * @return integer
     */
    public function getIdAdmooveVague1()
    {
        return $this->idAdmooveVague1;
    }

    /**
     * Set idCampagne
     *
     * @param \Campagne $idCampagne
     *
     * @return AdmooveVague1
     */
    public function setIdCampagne(Campagne $idCampagne = null)
    {
        $this->idCampagne = $idCampagne;

        return $this;
    }

    /**
     * Get idCampagne
     *
     * @return \Campagne
     */
    public function getIdCampagne()
    {
        return $this->idCampagne;
    }
}
