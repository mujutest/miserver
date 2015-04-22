<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CallAditionalInfo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CallAditionalInfo {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="call_id", type="string", length=255)
     */
    public $call_id;

    /**
     * @var string
     *
     * @ORM\Column(name="call_name", type="string", length=255)
     */
    public $call_name;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    public $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    public $last_name;

    /**
     * @var object
     *
     * @ORM\Column(name="info", type="object")
     */
    public $info;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer")
     */
    public $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="paid", type="integer")
     */
    public $paid;

    /**
     * @var array
     *
     * @ORM\Column(name="recommended", type="json_array")
     */
    public $recommended;

    /**
     * @var integer
     *
     * @ORM\Column(name="cc", type="integer")
     */
    public $cc;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set call_id
     *
     * @param string $call_id
     * @return CallAditionalInfo
     */
    public function setCallId($call_id) {
        $this->call_id = $call_id;

        return $this;
    }

    /**
     * Get call_id
     *
     * @return string 
     */
    public function getCallId() {
        return $this->call_id;
    }

    /**
     * Set call_name
     *
     * @param string $call_name
     * @return CallAditionalInfo
     */
    public function setCallName($call_name) {
        $this->call_name = $call_name;

        return $this;
    }

    /**
     * Get call_name
     *
     * @return string 
     */
    public function getCallName() {
        return $this->call_name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CallAditionalInfo
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return CallAditionalInfo
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

    /**
     * Set paid
     *
     * @param integer $paid
     * @return CallAditionalInfo
     */
    public function setPaid($paid) {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return integer 
     */
    public function getPaid() {
        return $this->paid;
    }

    /**
     * Set recomendations
     *
     * @param array $recommended
     * @return CallAditionalInfo
     */
    public function setRecomendations($recommended) {
        $this->recommended = $recommended;

        return $this;
    }

    /**
     * Get recommended
     *
     * @return array 
     */
    public function getRecomendations() {
        return $this->recommended;
    }

    /**
     * Set cc
     *
     * @param integer $cc
     * @return UserCall
     */
    public function setCc($cc) {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return integer 
     */
    public function getCc() {
        return $this->cc;
    }

    /**
     * Get email
     *
     * @return string 
     */
    function getEmail() {
        return $this->email;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    function getLast_name() {
        return $this->last_name;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    function getPhone() {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return UserCall
     */
    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Set last_name
     *
     * @param string $last_name
     * @return UserCall
     */
    function setLast_name($last_name) {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return UserCall
     */
    function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

}
