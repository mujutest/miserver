<?php

namespace Acme\MinticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class News
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
     * @ORM\Column(name="call_id", type="string", length=255)
     */
    public $call_id;

    /**
     * @var array
     *
     * @ORM\Column(name="news", type="json_array")
     */
    public $news;


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
     * @return News
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
     * Set call_id
     *
     * @param string $call_id
     * @return News
     */
    public function setCallId($call_id)
    {
        $this->call_id = $call_id;

        return $this;
    }

    /**
     * Get call_id
     *
     * @return string 
     */
    public function getCallId()
    {
        return $this->call_id;
    }

    /**
     * Set news
     *
     * @param array $news
     * @return News
     */
    public function setNews($news)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return array 
     */
    public function getNews()
    {
        return $this->news;
    }
}
