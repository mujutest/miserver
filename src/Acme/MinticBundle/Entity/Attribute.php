<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribute
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Attribute
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    public $name;

    /**
     * @var string
     *
     * @ORM\Column(name="data_type", type="string", length=255)
     */
    public $dataType;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="value", type="object")
     */
    public $value;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="children", type="object")
     */
    public $children;


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
     * Set name
     *
     * @param string $name
     * @return Attribute
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dataType
     *
     * @param string $dataType
     * @return Attribute
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Get dataType
     *
     * @return string 
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Set value
     *
     * @param \stdClass $value
     * @return Attribute
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return \stdClass 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set children
     *
     * @param \stdClass $children
     * @return Attribute
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Get children
     *
     * @return \stdClass 
     */
    public function getChildren()
    {
        return $this->children;
    }
}
