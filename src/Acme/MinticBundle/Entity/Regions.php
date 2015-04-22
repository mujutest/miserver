<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Regions
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
     * @ORM\Column(name="regions", type="json_array")
     */
    public $regions;

    /**
     * @var array
     *
     * @ORM\Column(name="towns", type="json_array")
     */
    public $towns;

    /**
     * @var array
     *
     * @ORM\Column(name="cities", type="json_array")
     */
    public $cities;

    /**
     * @var array
     *
     * @ORM\Column(name="departments", type="json_array")
     */
    public $departments;


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
     * Set regions
     *
     * @param array $regions
     * @return Regions
     */
    public function setRegions($regions)
    {
        $this->regions = $regions;

        return $this;
    }

    /**
     * Get regions
     *
     * @return array 
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * Set towns
     *
     * @param array $towns
     * @return Regions
     */
    public function setTowns($towns)
    {
        $this->towns = $towns;

        return $this;
    }

    /**
     * Get towns
     *
     * @return array 
     */
    public function getTowns()
    {
        return $this->towns;
    }

    /**
     * Set cities
     *
     * @param array $cities
     * @return Regions
     */
    public function setCities($cities)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * Get cities
     *
     * @return array 
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Set departaments
     *
     * @param array $departments
     * @return Regions
     */
    public function setDepartments($departments)
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * Get departments
     *
     * @return array 
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}
