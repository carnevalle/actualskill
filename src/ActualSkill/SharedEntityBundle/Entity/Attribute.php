<?php

namespace ActualSkill\SharedEntityBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\SharedEntityBundle\Entity\Attribute
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Attribute
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;    
    
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var string $name
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;    

    /**
     *
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="attribute")
     */    
    protected $ratings;
    
    public function __construct() {
        $this->ratings = new ArrayCollection();
    }    
    
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set name
     *
     * @param string $name
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }    
    
    /**
     * Set sort_order
     *
     * @param integer $sortOrder
     */
    public function setSortOrder($sortOrder)
    {
        $this->sort_order = $sortOrder;
    }

    /**
     * Get sort_order
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }
    
    public function __toString(){
        return $this->name;
    }
}