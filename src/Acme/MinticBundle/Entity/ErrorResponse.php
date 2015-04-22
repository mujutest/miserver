<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ErrorResponse
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ErrorResponse
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500)
     */
    public $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     */
    public $code;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200)
     */
    public $title;


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
     * Set description
     *
     * @param string $description
     * @return ErrorResponse
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return ErrorResponse
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return ErrorResponse
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
