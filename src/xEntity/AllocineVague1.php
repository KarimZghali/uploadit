<?php


namespace UPLOADIT\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AllocineVague1
 *
 * @ORM\Table(name="allocine_vague1", indexes={@ORM\Index(name="id_campagne", columns={"id_campagne"})})
 * @ORM\Entity
 */
class AllocineVague1
{
    /**
     * @var string
     *
     * @ORM\Column(name="start_date_allocine_vague1", type="string", length=20, nullable=true)
     */
    private $startDateAllocineVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="start_end_allocine_vague1", type="string", length=20, nullable=true)
     */
    private $startEndAllocineVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_pc_allocine_vague1", type="string", length=50, nullable=true)
     */
    private $habillagePcAllocineVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_mobile_allocine_vague1", type="string", length=50, nullable=true)
     */
    private $habillageMobileAllocineVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_tablette_allocine_vague1", type="string", length=50, nullable=true)
     */
    private $habillageTabletteAllocineVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="demipage_allocine_vague1", type="string", length=50, nullable=true)
     */
    private $demipageAllocineVague1;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_allocine_vague1", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAllocineVague1;

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
     * Set startDateAllocineVague1
     *
     * @param string $startDateAllocineVague1
     *
     * @return AllocineVague1
     */
    public function setStartDateAllocineVague1($startDateAllocineVague1)
    {
        $this->startDateAllocineVague1 = $startDateAllocineVague1;

        return $this;
    }

    /**
     * Get startDateAllocineVague1
     *
     * @return string
     */
    public function getStartDateAllocineVague1()
    {
        return $this->startDateAllocineVague1;
    }

    /**
     * Set startEndAllocineVague1
     *
     * @param string $startEndAllocineVague1
     *
     * @return AllocineVague1
     */
    public function setStartEndAllocineVague1($startEndAllocineVague1)
    {
        $this->startEndAllocineVague1 = $startEndAllocineVague1;

        return $this;
    }

    /**
     * Get startEndAllocineVague1
     *
     * @return string
     */
    public function getStartEndAllocineVague1()
    {
        return $this->startEndAllocineVague1;
    }

    /**
     * Set habillagePcAllocineVague1
     *
     * @param string $habillagePcAllocineVague1
     *
     * @return AllocineVague1
     */
    public function setHabillagePcAllocineVague1($habillagePcAllocineVague1)
    {
        $this->habillagePcAllocineVague1 = $habillagePcAllocineVague1;

        return $this;
    }

    /**
     * Get habillagePcAllocineVague1
     *
     * @return string
     */
    public function getHabillagePcAllocineVague1()
    {
        return $this->habillagePcAllocineVague1;
    }

    /**
     * Set habillageMobileAllocineVague1
     *
     * @param string $habillageMobileAllocineVague1
     *
     * @return AllocineVague1
     */
    public function setHabillageMobileAllocineVague1($habillageMobileAllocineVague1)
    {
        $this->habillageMobileAllocineVague1 = $habillageMobileAllocineVague1;

        return $this;
    }

    /**
     * Get habillageMobileAllocineVague1
     *
     * @return string
     */
    public function getHabillageMobileAllocineVague1()
    {
        return $this->habillageMobileAllocineVague1;
    }

    /**
     * Set habillageTabletteAllocineVague1
     *
     * @param string $habillageTabletteAllocineVague1
     *
     * @return AllocineVague1
     */
    public function setHabillageTabletteAllocineVague1($habillageTabletteAllocineVague1)
    {
        $this->habillageTabletteAllocineVague1 = $habillageTabletteAllocineVague1;

        return $this;
    }

    /**
     * Get habillageTabletteAllocineVague1
     *
     * @return string
     */
    public function getHabillageTabletteAllocineVague1()
    {
        return $this->habillageTabletteAllocineVague1;
    }

    /**
     * Set demipageAllocineVague1
     *
     * @param string $demipageAllocineVague1
     *
     * @return AllocineVague1
     */
    public function setDemipageAllocineVague1($demipageAllocineVague1)
    {
        $this->demipageAllocineVague1 = $demipageAllocineVague1;

        return $this;
    }

    /**
     * Get demipageAllocineVague1
     *
     * @return string
     */
    public function getDemipageAllocineVague1()
    {
        return $this->demipageAllocineVague1;
    }

    /**
     * Get idAllocineVague1
     *
     * @return integer
     */
    public function getIdAllocineVague1()
    {
        return $this->idAllocineVague1;
    }

    /**
     * Set idCampagne
     *
     * @param \Campagne $idCampagne
     *
     * @return AllocineVague1
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
