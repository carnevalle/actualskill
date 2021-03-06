<?php

namespace ActualSkill\CoreBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\CoreBundle\Entity\Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ActualSkill\CoreBundle\Repository\CategoryRepository")
 */
class Category
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;
    
    /**
     * @ORM\ManyToMany(targetEntity="Attribute")
     */    
    private $attributes;

    private $average;
    
    public function __construct() {
        $this->attributes = new ArrayCollection();
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
    
    public function setAverage($average){
        $this->average = $average;
    }
    
    public function getAverage(){
        return round($this->average, 2);
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
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }      
    
    /**
     * Add attributes
     *
     * @param ActualSkill\CoreBundle\Entity\Attribute $attributes
     */
    public function addAttributes(\ActualSkill\CoreBundle\Entity\Attribute $attributes)
    {
        $this->attributes[] = $attributes;
    }

    /**
     * Get attributes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Add attributes
     *
     * @param ActualSkill\CoreBundle\Entity\Attribute $attributes
     */
    public function addAttribute(\ActualSkill\CoreBundle\Entity\Attribute $attributes)
    {
        $this->attributes[] = $attributes;
    }
    
    public function __toString(){
        return $this->name;
    }    
}