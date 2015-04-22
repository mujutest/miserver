<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Token
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Token {

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
     * @ORM\Column(name="token", type="string", length=300)
     */
    public $token;

    /**
     * @var string
     *
     * @ORM\Column(name="expiration_date", type="string", length=255)
     */
    public $expiration_date;

    /**
     * @var string
     *
     * @ORM\Column(name="cc", type="string", length=255)
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
     * Set token
     *
     * @param string $token
     * @return Token
     */
    public function setToken($token) {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * Set expiration_date
     *
     * @param string $expiration_date
     * @return Token
     */
    public function setExpirationDate($expiration_date) {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    /**
     * Get xpiration_date
     *
     * @return string 
     */
    public function getExpirationDate() {
        return $this->expiration_date;
    }

    /**
     * Set cc
     *
     * @param string $cc
     * @return Token
     */
    public function setCc($cc) {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return string 
     */
    public function getCc() {
        return $this->cc;
    }

}
