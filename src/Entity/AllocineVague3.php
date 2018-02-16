<?php
namespace UPLOADIT\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * AllocineVague3
 *
 * @ORM\Table(name="allocine_vague3", indexes={@ORM\Index(name="id_campagne", columns={"id_campagne"})})
 * @ORM\Entity
 */
class AllocineVague3
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_allocine_vague2", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAllocineVague2;

    /**
     * @var string
     *
     * @ORM\Column(name="start_date_allocine_vague3", type="string", length=10, nullable=true)
     */
    private $startDateAllocineVague3;

    /**
     * @var string
     *
     * @ORM\Column(name="start_end_allocine_vague3", type="string", length=10, nullable=true)
     */
    private $startEndAllocineVague3;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_pc_allocine_vague3", type="string", length=50, nullable=true)
     */
    private $habillagePcAllocineVague3;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_mobile_allocine_vague3", type="string", length=50, nullable=true)
     */
    private $habillageMobileAllocineVague3;

    /**
     * @var string
     *
     * @ORM\Column(name="habillage_tablette_allocine_vague3", type="string", length=50, nullable=true)
     */
    private $habillageTabletteAllocineVague3;

    /**
     * @var string
     *
     * @ORM\Column(name="demipage_allocine_vague3", type="string", length=50, nullable=true)
     */
    private $demipageAllocineVague3;

    /**
     * @var \Campagne
     *
     * @ORM\ManyToOne(targetEntity="Campagne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_campagne", referencedColumnName="id_campagne")
     * })
     */
    private $idCampagne;



    /**
     * Set startDateAllocineVague3
     *
     * @param string $startDateAllocineVague3
     *
     * @return AllocineVague3
     */
    public function setStartDateAllocineVague3($startDateAllocineVague3)
    {
        $this->startDateAllocineVague3 = $startDateAllocineVague3;

        return $this;
    }

    /**
     * Get startDateAllocineVague3
     *
     * @return string
     */
    public function getStartDateAllocineVague3()
    {
        return $this->startDateAllocineVague3;
    }

    /**
     * Set startEndAllocineVague3
     *
     * @param string $startEndAllocineVague3
     *
     * @return AllocineVague3
     */
    public function setStartEndAllocineVague3($startEndAllocineVague3)
    {
        $this->startEndAllocineVague3 = $startEndAllocineVague3;

        return $this;
    }

    /**
     * Get startEndAllocineVague3
     *
     * @return string
     */
    public function getStartEndAllocineVague3()
    {
        return $this->startEndAllocineVague3;
    }

    /**
     * Set habillagePcAllocineVague3
     *
     * @param string $habillagePcAllocineVague3
     *
     * @return AllocineVague3
     */
    public function setHabillagePcAllocineVague3($habillagePcAllocineVague3)
    {
        $this->habillagePcAllocineVague3 = $habillagePcAllocineVague3;

        return $this;
    }

    /**
     * Get habillagePcAllocineVague3
     *
     * @return string
     */
    public function getHabillagePcAllocineVague3()
    {
        return $this->habillagePcAllocineVague3;
    }

    /**
     * Set habillageMobileAllocineVague3
     *
     * @param string $habillageMobileAllocineVague3
     *
     * @return AllocineVague3
     */
    public function setHabillageMobileAllocineVague3($habillageMobileAllocineVague3)
    {
        $this->habillageMobileAllocineVague3 = $habillageMobileAllocineVague3;

        return $this;
    }

    /**
     * Get habillageMobileAllocineVague3
     *
     * @return string
     */
    public function getHabillageMobileAllocineVague3()
    {
        return $this->habillageMobileAllocineVague3;
    }

    /**
     * Set habillageTabletteAllocineVague3
     *
     * @param string $habillageTabletteAllocineVague3
     *
     * @return AllocineVague3
     */
    public function setHabillageTabletteAllocineVague3($habillageTabletteAllocineVague3)
    {
        $this->habillageTabletteAllocineVague3 = $habillageTabletteAllocineVague3;

        return $this;
    }

    /**
     * Get habillageTabletteAllocineVague3
     *
     * @return string
     */
    public function getHabillageTabletteAllocineVague3()
    {
        return $this->habillageTabletteAllocineVague3;
    }

    /**
     * Set demipageAllocineVague3
     *
     * @param string $demipageAllocineVague3
     *
     * @return AllocineVague3
     */
    public function setDemipageAllocineVague3($demipageAllocineVague3)
    {
        $this->demipageAllocineVague3 = $demipageAllocineVague3;

        return $this;
    }

    /**
     * Get demipageAllocineVague3
     *
     * @return string
     */
    public function getDemipageAllocineVague3()
    {
        return $this->demipageAllocineVague3;
    }

    /**
     * Get idAllocineVague2
     *
     * @return integer
     */
    public function getIdAllocineVague2()
    {
        return $this->idAllocineVague2;
    }

    /**
     * Set idCampagne
     *
     * @param \Campagne $idCampagne
     *
     * @return AllocineVague3
     */
    public function setIdCampagne(\Campagne $idCampagne = null)
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
