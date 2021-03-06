<?php

namespace ActualSkill\CoreBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\CoreBundle\Entity\User
 * 
 * @ORM\Entity
 * @ORM\Table(name="ActualSkillUser")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;
    
    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $nationality;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    protected $club;    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="user")
     */    
    protected $ratings;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PositionRating", mappedBy="user")
     */    
    protected $positionRatings;    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PerformanceRating", mappedBy="user")
     */    
    protected $performanceRatings;       
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */        
    protected $comments;    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="BaseEntityLike", mappedBy="user")
     */
    protected $likes;


    public function __construct()
    {
        parent::__construct();
        
        $this->ratings = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->positionRatings = new ArrayCollection();
        $this->performanceRatings = new ArrayCollection();
    }
    
    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);
    }
    
    /**
     * Set nationality
     *
     * @param ActualSkill\CoreBundle\Entity\Country $nationality
     */
    public function setNationality(\ActualSkill\CoreBundle\Entity\Country $nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * Get nationality
     *
     * @return ActualSkill\CoreBundle\Entity\Country 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }    

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }    
    
    public function getLastname()
    {
        return $this->lastname;
    }    
    
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }  
    
    /**
     * Get full name
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->firstname." ".$this->lastname;
    }      
    
    /**
     * Set club
     *
     * @param ActualSkill\CoreBundle\Entity\Club $club
     */
    public function setClub(\ActualSkill\CoreBundle\Entity\Club $club)
    {
        $this->club = $club;
    }

    /**
     * Get club
     *
     * @return ActualSkill\CoreBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
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
    
    public function __toString() {
        return $this->firstname." ".$this->lastname;
    }    

    /**
     * Add positionRatings
     *
     * @param ActualSkill\CoreBundle\Entity\PositionRating $positionRatings
     */
    public function addPositionRating(\ActualSkill\CoreBundle\Entity\PositionRating $positionRatings)
    {
        $this->positionRatings[] = $positionRatings;
    }

    /**
     * Get positionRatings
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPositionRatings()
    {
        return $this->positionRatings;
    }
    
    /**
     * Add performanceRatings
     *
     * @param ActualSkill\CoreBundle\Entity\PerformanceRating $performanceRatings
     */
    public function addPerformanceRating(\ActualSkill\CoreBundle\Entity\PerformanceRating $performanceRatings)
    {
        $this->performanceRatings[] = $performanceRatings;
    }

    /**
     * Get performanceRatings
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPerformanceRatings()
    {
        return $this->performanceRatings;
    }    
}