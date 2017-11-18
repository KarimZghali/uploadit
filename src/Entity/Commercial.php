<?php

namespace UPLOADIT\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commercial
 *
 * @ORM\Table(name="commercial")
 * @ORM\Entity
 */
class Commercial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commercial", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="name_commercial", type="string", length=30, nullable=false)
     */
    private $nameCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="email_commercial", type="string", length=30, nullable=false)
     */
    private $emailCommercial;



    /**
     * Set nameCommercial
     *
     * @param string $nameCommercial
     *
     * @return Commercial
     */
    public function setNameCommercial($nameCommercial)
    {
        $this->nameCommercial = $nameCommercial;

        return $this;
    }

    /**
     * Get nameCommercial
     *
     * @return string
     */
    public function getNameCommercial()
    {
        return $this->nameCommercial;
    }

    /**
     * Set emailCommercial
     *
     * @param string $emailCommercial
     *
     * @return Commercial
     */
    public function setEmailCommercial($emailCommercial)
    {
        $this->emailCommercial = $emailCommercial;

        return $this;
    }

    /**
     * Get emailCommercial
     *
     * @return string
     */
    public function getEmailCommercial()
    {
        return $this->emailCommercial;
    }

    /**
     * Get idCommercial
     *
     * @return integer
     */
    public function getIdCommercial()
    {
        return $this->idCommercial;
    }
}
