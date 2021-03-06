<?php

namespace UPLOADIT\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campagne
 *
 * @ORM\Table(name="campagne", indexes={@ORM\Index(name="id_customer", columns={"id_customer"}), @ORM\Index(name="id_commercial", columns={"id_commercial"})})
 * @ORM\Entity
 */
class Campagne
{
    /**
     * @var string
     *
     * @ORM\Column(name="number_bdc_campagne", type="string", length=6, nullable=false)
     */
    private $numberBdcCampagne;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_campagne", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCampagne;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     * })
     */
    private $idCustomer;

    /**
     * @var \Commercial
     *
     * @ORM\ManyToOne(targetEntity="Commercial", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commercial", referencedColumnName="id_commercial")
     * })
     */
    private $idCommercial;



    /**
     * Set numberBdcCampagne
     *
     * @param string $numberBdcCampagne
     *
     * @return Campagne
     */
    public function setNumberBdcCampagne($numberBdcCampagne)
    {
        $this->numberBdcCampagne = $numberBdcCampagne;

        return $this;
    }

    /**
     * Get numberBdcCampagne
     *
     * @return string
     */
    public function getNumberBdcCampagne()
    {
        return $this->numberBdcCampagne;
    }

    /**
     * Get idCampagne
     *
     * @return integer
     */
    public function getIdCampagne()
    {
        return $this->idCampagne;
    }

    /**
     * Set idCustomer
     *
     * @param \Customer $idCustomer
     *
     * @return Campagne
     */
    public function setIdCustomer(\Customer $idCustomer = null)
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    /**
     * Get idCustomer
     *
     * @return \Customer
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Set idCommercial
     *
     * @param \Commercial $idCommercial
     *
     * @return Campagne
     */
    public function setIdCommercial(\Commercial $idCommercial = null)
    {
        $this->idCommercial = $idCommercial;

        return $this;
    }

    /**
     * Get idCommercial
     *
     * @return \Commercial
     */
    public function getIdCommercial()
    {
        return $this->idCommercial;
    }
}
