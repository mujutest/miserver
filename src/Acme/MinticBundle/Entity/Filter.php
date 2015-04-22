<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filter
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Filter {

    /**
     * @var object
     *
     * @ORM\Column(name="info", type="object")
     */
    public $info;

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
     * @ORM\Column(name="count", type="object")
     */
    public $count;

    /**
     * @var integer
     *
     * @ORM\Column(name="money", type="integer")
     */
    public $money;

    /**
     * @var string
     *
     * @ORM\Column(name="percentage", type="string", length=255)
     */
    public $percentage;

    /**
     * @var array
     *
     * @ORM\Column(name="points", type="json_array")
     */
    public $points;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set count
     *
     * @param object $count
     * @return Filter
     */
    public function setCount($count) {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return object 
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Set money
     *
     * @param integer $money
     * @return Filter
     */
    public function setMoney($money) {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return integer 
     */
    public function getMoney() {
        return $this->money;
    }

    /**
     * Set percentage
     *
     * @param string $percentage
     * @return Filter
     */
    public function setPercentage($percentage) {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return string 
     */
    public function getPercentage() {
        return $this->percentage;
    }

    /**
     * Set points
     *
     * @param array $points
     * @return Filter
     */
    public function setPoints($points) {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return array 
     */
    public function getPoints() {
        return $this->points;
    }

    /**
     * Set info
     *
     * @param object $info
     * @return Calls
     */
    public function setInfo($info) {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return object 
     */
    public function getInfo() {
        return $this->info;
    }

}
