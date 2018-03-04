<?php

namespace UPLOADIT\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AllocineVague4
 *
 * @ORM\Table(name="allocine_vague4", indexes={@ORM\Index(name="id_campagne", columns={"id_campagne"})})
 * @ORM\Entity
 */
class AllocineVague4
{
    /**
     * @var string
     *
     * @ORM\Column(name="start_date_allocine_vague4", type="string", length=20, nullable=true)
     */
    private $startDateAllocineVague4;

    /**
     * @var string
     *
     * @ORM\Column(name="start_end_allocine_vague4", type="string", length=20, nullable=true)
     */
    private $startEndAllocineVague4;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_pc_allocine_vague4", type="string", length=50, nullable=true)
     */
    private $habillagePcAllocineVague4;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_mobile_allocine_vague4", type="string", length=50, nullable=true)
     */
    private $habillageMobileAllocineVague4;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_tablette_allocine_vague4", type="string", length=50, nullable=true)
     */
    private $habillageTabletteAllocineVague4;

    /**
     * @var string
     *
     * @ORM\Column(name="demipage_allocine_vague4", type="string", length=50, nullable=true)
     */
    private $demipageAllocineVague4;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_allocine_vague4", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAllocineVague4;

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
     * Set startDateAllocineVague4
     *
     * @param string $startDateAllocineVague4
     *
     * @return AllocineVague4
     */
    public function setStartDateAllocineVague4($startDateAllocineVague4)
    {
        $this->startDateAllocineVague4 = $startDateAllocineVague4;

        return $this;
    }

    /**
     * Get startDateAllocineVague4
     *
     * @return string
     */
    public function getStartDateAllocineVague4()
    {
        return $this->startDateAllocineVague4;
    }

    /**
     * Set startEndAllocineVague4
     *
     * @param string $startEndAllocineVague4
     *
     * @return AllocineVague4
     */
    public function setStartEndAllocineVague4($startEndAllocineVague4)
    {
        $this->startEndAllocineVague4 = $startEndAllocineVague4;

        return $this;
    }

    /**
     * Get startEndAllocineVague4
     *
     * @return string
     */
    public function getStartEndAllocineVague4()
    {
        return $this->startEndAllocineVague4;
    }

    /**
     * Set habillagePcAllocineVague4
     *
     * @param string $habillagePcAllocineVague4
     *
     * @return AllocineVague4
     */
    public function setHabillagePcAllocineVague4($habillagePcAllocineVague4)
    {
        $this->habillagePcAllocineVague4 = $habillagePcAllocineVague4;

        return $this;
    }

    /**
     * Get habillagePcAllocineVague4
     *
     * @return string
     */
    public function getHabillagePcAllocineVague4()
    {
        return $this->habillagePcAllocineVague4;
    }

    /**
     * Set habillageMobileAllocineVague4
     *
     * @param string $habillageMobileAllocineVague4
     *
     * @return AllocineVague4
     */
    public function setHabillageMobileAllocineVague4($habillageMobileAllocineVague4)
    {
        $this->habillageMobileAllocineVague4 = $habillageMobileAllocineVague4;

        return $this;
    }

    /**
     * Get habillageMobileAllocineVague4
     *
     * @return string
     */
    public function getHabillageMobileAllocineVague4()
    {
        return $this->habillageMobileAllocineVague4;
    }

    /**
     * Set habillageTabletteAllocineVague4
     *
     * @param string $habillageTabletteAllocineVague4
     *
     * @return AllocineVague4
     */
    public function setHabillageTabletteAllocineVague4($habillageTabletteAllocineVague4)
    {
        $this->habillageTabletteAllocineVague4 = $habillageTabletteAllocineVague4;

        return $this;
    }

    /**
     * Get habillageTabletteAllocineVague4
     *
     * @return string
     */
    public function getHabillageTabletteAllocineVague4()
    {
        return $this->habillageTabletteAllocineVague4;
    }

    /**
     * Set demipageAllocineVague4
     *
     * @param string $demipageAllocineVague4
     *
     * @return AllocineVague4
     */
    public function setDemipageAllocineVague4($demipageAllocineVague4)
    {
        $this->demipageAllocineVague4 = $demipageAllocineVague4;

        return $this;
    }

    /**
     * Get demipageAllocineVague4
     *
     * @return string
     */
    public function getDemipageAllocineVague4()
    {
        return $this->demipageAllocineVague4;
    }

    /**
     * Get idAllocineVague4
     *
     * @return integer
     */
    public function getIdAllocineVague4()
    {
        return $this->idAllocineVague4;
    }

    /**
     * Set idCampagne
     *
     * @param \Campagne $idCampagne
     *
     * @return AllocineVague4
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
