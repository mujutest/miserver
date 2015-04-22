<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CountInformation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CountInformation {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="male", type="integer")
     */
    public $male;

  
    /**
     * @var integer
     *
     * @ORM\Column(name="female", type="integer")
     */
    public $female;

    /**
     * @var integer
     *
     * @ORM\Column(name="tech", type="integer")
     */
    public $tech;

    /**
     * @var integer
     *
     * @ORM\Column(name="profesional", type="integer")
     */
    public $profesional;

    /**
     * @var integer
     *
     * @ORM\Column(name="economic_status1", type="integer")
     */
    public $economic_status1;

    /**
     * @var integer
     *
     * @ORM\Column(name="economic_status2", type="integer")
     */
    public $economic_status2;

    /**
     * @var integer
     *
     * @ORM\Column(name="economic_status3", type="integer")
     */
    public $economic_status3;

    /**
     * @var integer
     *
     * @ORM\Column(name="economic_status4", type="integer")
     */
    public $economic_status4;

    /**
     * @var integer
     *
     * @ORM\Column(name="economic_status5", type="integer")
     */
    public $economic_status5;

    /**
     * @var integer
     *
     * @ORM\Column(name="economic_status6", type="integer")
     */
    public $economic_status6;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    public $total;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set male
     *
     * @param integer $male
     * @return CountInformation
     */
    public function setMale($male) {
        $this->male = $male;

        return $this;
    }

    /**
     * Get male
     *
     * @return integer 
     */
    public function getMale() {
        return $this->male;
    }

    /**
     * Set female
     *
     * @param integer $female
     * @return CountInformation
     */
    public function setFemale($female) {
        $this->female = $female;

        return $this;
    }

    /**
     * Get female
     *
     * @return integer 
     */
    public function getFemale() {
        return $this->female;
    }

    /**
     * Set tech
     *
     * @param integer $tech
     * @return CountInformation
     */
    public function setTech($tech) {
        $this->tech = $tech;

        return $this;
    }

    /**
     * Get tech
     *
     * @return integer 
     */
    public function getTech() {
        return $this->tech;
    }

    /**
     * Set profesional
     *
     * @param integer $profesional
     * @return CountInformation
     */
    public function setProfesional($profesional) {
        $this->profesional = $profesional;

        return $this;
    }

    /**
     * Get profesional
     *
     * @return integer 
     */
    public function getProfesional() {
        return $this->profesional;
    }

    /**
     * Set economic_status1
     *
     * @param integer $economic_status1
     * @return CountInformation
     */
    public function setEconomicStatus1($economic_status1) {
        $this->economic_status1 = $economic_status1;

        return $this;
    }

    /**
     * Get economic_status1
     *
     * @return integer 
     */
    public function getEconomicStatus1() {
        return $this->economic_status1;
    }

    /**
     * Set economic_status2
     *
     * @param integer $economic_status2
     * @return CountInformation
     */
    public function setEconomicStatus2($economic_status2) {
        $this->economic_status2 = $economic_status2;

        return $this;
    }

    /**
     * Get economic_status2
     *
     * @return integer 
     */
    public function getEconomicStatus2() {
        return $this->economic_status2;
    }

    /**
     * Set economic_status3
     *
     * @param integer $economic_status3
     * @return CountInformation
     */
    public function setEconomicStatus3($economic_status3) {
        $this->economic_status3 = $economic_status3;

        return $this;
    }

    /**
     * Get economic_status3
     *
     * @return integer 
     */
    public function getEconomicStatus3() {
        return $this->economic_status3;
    }

    /**
     * Set economic_status4
     *
     * @param integer $economic_status4
     * @return CountInformation
     */
    public function setEconomicStatus4($economic_status4) {
        $this->economic_status4 = $economic_status4;

        return $this;
    }

    /**
     * Get economic_status4
     *
     * @return integer 
     */
    public function getEconomicStatus4() {
        return $this->economic_status4;
    }

    /**
     * Set economic_status5
     *
     * @param integer $economic_status5
     * @return CountInformation
     */
    public function setEconomicStatus5($economic_status5) {
        $this->economic_status5 = $economic_status5;

        return $this;
    }

    /**
     * Get economic_status5
     *
     * @return integer 
     */
    public function getEconomicStatus5() {
        return $this->economic_status5;
    }

    /**
     * Set economic_status_6
     *
     * @param integer $economic_status6
     * @return CountInformation
     */
    public function setEconomicStatus6($economic_status6) {
        $this->economic_status6 = $economic_status6;

        return $this;
    }

    /**
     * Get economic_status6
     *
     * @return integer 
     */
    public function getEconomicStatus6() {
        return $this->economic_status6;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return CountInformation
     */
    public function setTotal($total) {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal() {
        return $this->total;
    }
  
}
