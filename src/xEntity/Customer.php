<?php

namespace UPLOADIT\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var string
     *
     * @ORM\Column(name="email_customer", type="string", length=40, nullable=true)
     */
    private $emailCustomer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_customer", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCustomer;



    /**
     * Set emailCustomer
     *
     * @param string $emailCustomer
     *
     * @return Customer
     */
    public function setEmailCustomer($emailCustomer)
    {
        $this->emailCustomer = $emailCustomer;

        return $this;
    }

    /**
     * Get emailCustomer
     *
     * @return string
     */
    public function getEmailCustomer()
    {
        return $this->emailCustomer;
    }

    /**
     * Get idCustomer
     *
     * @return integer
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }
}
