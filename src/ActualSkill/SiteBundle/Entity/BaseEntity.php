<?php

namespace ActualSkill\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"base" = "BaseEntity", "player" = "Player", "club" = "Club", "stadium" = "Stadium"})
 */
class BaseEntity
{

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
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
    protected $name;    
    
    /**
     *
     * @var string $type
     * 
     * This is set in child classes to match the value in the discriminatorMap
     */
    protected $type = "";
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="object")
     */    
    protected $ratings;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="object")
     */        
    protected $comments;
    
    public function __construct() {
        $this->ratings = new ArrayCollection();
        $this->comments = new ArrayCollection();
        
    }
    
    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
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
     * Add ratings
     *
     * @param ActualSkill\SiteBundle\Entity\Rating $ratings
     */
    public function addRatings(\ActualSkill\SiteBundle\Entity\Rating $ratings)
    {
        $this->ratings[] = $ratings;
    }

    /**
     * Get ratings
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Add comments
     *
     * @param ActualSkill\SiteBundle\Entity\Comment $comments
     */
    public function addComments(\ActualSkill\SiteBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}