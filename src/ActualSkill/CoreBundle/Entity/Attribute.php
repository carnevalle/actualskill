<?php

namespace ActualSkill\CoreBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\CoreBundle\Entity\Attribute
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ActualSkill\CoreBundle\Repository\AttributeRepository")
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;    

    /**
     *
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="attribute")
     */    
    protected $ratings;

    /**
     *
     * @ORM\OneToMany(targetEntity="CalculatedRating", mappedBy="attribute")
     */   
    private $calculatedRatings;
    
    private $average;
    private $userRating;
    private $numberOfRatings;
    
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
    
    public function setUserRating($rating){
        $this->userRating = $rating;
    }
    
    public function getUserRating(){
        return $this->userRating;
    }    
    
    public function setNumberOfRatings($total){
        $this->numberOfRatings = $total;
    }    
    
    public function getNumberOfRatings(){
        return $this->numberOfRatings;
    }    
    
    public function setAverageRating($average){
        $this->average = $average;
    }
    
    public function getAverageRating(){
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
    
    public function __toString(){
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
     * Add ratings
     *
     * @param ActualSkill\CoreBundle\Entity\Rating $ratings
     */
    public function addRating(\ActualSkill\CoreBundle\Entity\Rating $ratings)
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
}