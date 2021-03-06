<?php

namespace ActualSkill\CoreBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"base" = "BaseEntity", "player" = "Player", "club" = "Club", "stadium" = "Stadium", "match" = "FootballMatch"})
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
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="object", cascade={"persist"})
     */    
    protected $ratings;
    
    /**
     * @var float $ratingAverage
     *
     * @ORM\Column(name="rating_average", type="decimal", precision=4, scale=2, nullable=true)
     */       
    protected $ratingAverage = 0;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="object", cascade={"persist"})
     */        
    protected $comments;
    
    /**
     * @ORM\OneToOne(targetEntity="StatSheet")
     * @ORM\JoinColumn(name="latest_statsheet_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $latestStatsheet;    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="StatSheet", mappedBy="object", cascade={"persist"})
     */    
    protected $statsheets;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="RatingSchema", inversedBy="objects")
     */        
    protected $ratingschema;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="BaseEntityLike", mappedBy="object", cascade={"persist"})
     */   
    protected $likes;
    
    public function __construct() {
        $this->ratings = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
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
     * @param ActualSkill\CoreBundle\Entity\Rating $ratings
     */
    public function addRatings(\ActualSkill\CoreBundle\Entity\Rating $ratings)
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
     * @param ActualSkill\CoreBundle\Entity\Comment $comments
     */
    public function addComments(\ActualSkill\CoreBundle\Entity\Comment $comments)
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
     * Add comments
     *
     * @param ActualSkill\CoreBundle\Entity\Comment $comments
     */
    public function addComment(\ActualSkill\CoreBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    }

    /**
     * Add statsheet
     *
     * @param ActualSkill\CoreBundle\Entity\StatSheet $statsheets
     */
    public function setLatestStatsheet(\ActualSkill\CoreBundle\Entity\StatSheet $statsheet)
    {
        $this->latestStatsheet = $statsheet;
    }

    /**
     * Get statsheets
     *
     * @return ActualSkill\CoreBundle\Entity\StatSheet
     */
    public function getLatestStatsheet()
    {
        return $this->latestStatsheet;
    }    
    
    /**
     * Add statsheets
     *
     * @param ActualSkill\CoreBundle\Entity\StatSheet $statsheets
     */
    public function addStatSheet(\ActualSkill\CoreBundle\Entity\StatSheet $statsheets)
    {
        $this->statsheets[] = $statsheets;
    }

    /**
     * Get statsheets
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getStatsheets()
    {
        return $this->statsheets;
    }

    /**
     * Set ratingschema
     *
     * @param ActualSkill\CoreBundle\Entity\RatingSchema $ratingschema
     */
    public function setRatingschema(\ActualSkill\CoreBundle\Entity\RatingSchema $ratingschema)
    {
        $this->ratingschema = $ratingschema;
    }

    /**
     * Get ratingschema
     *
     * @return ActualSkill\CoreBundle\Entity\RatingSchema 
     */
    public function getRatingschema()
    {
        return $this->ratingschema;
    }     

    /**
     * Set ratingAverage
     *
     * @param string $ratingAverage
     */
    public function setAverageRating($ratingAverage)
    {
        $this->ratingAverage = $ratingAverage;
    }

    /**
     * Get ratingAverage
     *
     * @return string 
     */
    public function getAverageRating()
    {
        return $this->ratingAverage;
    }  

    /**
     * Add likes
     *
     * @param ActualSkill\CoreBundle\Entity\BaseEntityLike $likes
     */
    public function addBaseEntityLike(\ActualSkill\CoreBundle\Entity\BaseEntityLike $likes)
    {
        $this->likes[] = $likes;
    }

    /**
     * Get likes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLikes()
    {
        return $this->likes;
    }
}