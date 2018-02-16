<?php
namespace UPLOADIT\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * NrjVague1
 *
 * @ORM\Table(name="nrj_vague1", indexes={@ORM\Index(name="id_campagne", columns={"id_campagne"})})
 * @ORM\Entity
 */
class NrjVague1
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_nrj_vague1", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNrjVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="pave_nrj_vague1", type="string", length=50, nullable=true)
     */
    private $paveNrjVague1;

    /**
     * @var string
     *
     * @ORM\Column(name="banniere_nrj_vague1", type="string", length=50, nullable=true)
     */
    private $banniereNrjVague1;

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
     * Set paveNrjVague1
     *
     * @param string $paveNrjVague1
     *
     * @return NrjVague1
     */
    public function setPaveNrjVague1($paveNrjVague1)
    {
        $this->paveNrjVague1 = $paveNrjVague1;

        return $this;
    }

    /**
     * Get paveNrjVague1
     *
     * @return string
     */
    public function getPaveNrjVague1()
    {
        return $this->paveNrjVague1;
    }

    /**
     * Set banniereNrjVague1
     *
     * @param string $banniereNrjVague1
     *
     * @return NrjVague1
     */
    public function setBanniereNrjVague1($banniereNrjVague1)
    {
        $this->banniereNrjVague1 = $banniereNrjVague1;

        return $this;
    }

    /**
     * Get banniereNrjVague1
     *
     * @return string
     */
    public function getBanniereNrjVague1()
    {
        return $this->banniereNrjVague1;
    }

    /**
     * Get idNrjVague1
     *
     * @return integer
     */
    public function getIdNrjVague1()
    {
        return $this->idNrjVague1;
    }

    /**
     * Set idCampagne
     *
     * @param \Campagne $idCampagne
     *
     * @return NrjVague1
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
