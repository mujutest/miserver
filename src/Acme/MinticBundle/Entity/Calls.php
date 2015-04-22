<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calls
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Calls
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var array
     *
     * @ORM\Column(name="available", type="json_array")
     */
    public $available;


    /**
     * @var array
     *
     * @ORM\Column(name="national_info", type="json_array")
     */
    public $national_info;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set available
     *
     * @param array $available
     * @return Calls
     */
    public function setAviable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return array 
     */
    public function getAviable()
    {
        return $this->available;
    }

   

    /**
     * Set national_info
     *
     * @param array $national_info
     * @return Calls
     */
    public function setNationalInfo($national_info)
    {
        $this->national_info = $national_info;

        return $this;
    }

    /**
     * Get national_info
     *
     * @return array 
     */
    public function getNationalInfo()
    {
        return $this->national_info;
    }
}
