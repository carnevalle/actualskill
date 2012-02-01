<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\CoreBundle\Entity\Player
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ActualSkill\CoreBundle\Repository\PlayerRepository")
 * @ORM\Table(name="Player")
 */
class Player extends BaseEntity
{   
    
    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=100)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;
    
    /**
     * @var string $nickmane
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    private $nickname;  

    /**
     * @var string $twitter
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;     
    
    /**
     * @var date $birthday
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;    
    
    /**
     * @var integer $height
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;

    /**
     * @var integer $weight
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight; 
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="players")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    protected $club;      
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="players")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country; 
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PositionRating", mappedBy="player")
     */    
    protected $positionRatings;    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PerformanceRating", mappedBy="player")
     */    
    protected $performanceRatings;      
    
    public function __construct() {
        parent::__construct();
        $this->positionRatings = new ArrayCollection();
        $this->performanceRatings = new ArrayCollection();
        
    }
    
    /**
    * @ORM\postLoad
    */    
    public function setObjectTypeOnLoad(){
        
        $this->type="player";
    }
    
    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }  

    /**
     * Get nameReversed
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->firstname." ".$this->lastname;
    }     
    
    /**
     * Get nameReversed
     *
     * @return string 
     */
    public function getNameReversed()
    {
        return $this->lastname.", ".$this->firstname;
    }       
    
    /**
     * Get age
     *
     * @return integer 
     */    
    public function getAge(){
        $dateNow = new \DateTime();
        $dateInterval = $dateNow->diff($this->birthday);
        return $dateInterval->y;
    }
    
    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set country
     *
     * @param ActualSkill\CoreBundle\Entity\Club $country
     */
    public function setClub(\ActualSkill\CoreBundle\Entity\Club $club)
    {
        $this->club = $club;
    }

    /**
     * Get country
     *
     * @return ActualSkill\CoreBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
    }    
    
    /**
     * Set country
     *
     * @param ActualSkill\CoreBundle\Entity\Country $country
     */
    public function setCountry(\ActualSkill\CoreBundle\Entity\Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return ActualSkill\CoreBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }    
    
    /**
     * Set height
     *
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set birthday
     *
     * @param date $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * Get birthday
     *
     * @return date 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    
    public function setIsGoalkeeper($isGoalkeeper){
        $this->isGoalkeeper = $isGoalkeeper;
    }
    
    public function getIsGoalkeeper(){
        return $this->isGoalkeeper;
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
    
    public function __toString() {
        return "";
    }     
}