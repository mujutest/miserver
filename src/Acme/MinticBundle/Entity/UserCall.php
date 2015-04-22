<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCall
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserCall {

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
     * @ORM\Column(name="call_id", type="integer")
     */
    public $call_id;

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
     * @var object
     *
     * @ORM\Column(name="info", type="object")
     */
    public $info;

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
     * Set name
     *
     * @param string $name
     * @return UserCall
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
     * Set email
     *
     * @param string $email
     * @return UserCall
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }


    /**
     * Set info
     *
     * @param string $info
     * @return UserCall
     */
    public function setInfo($info) {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo() {
        return $this->info;
    }

  

    /**
     * Set call_id
     *
     * @param string $call_id
     * @return UserCall
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

}
