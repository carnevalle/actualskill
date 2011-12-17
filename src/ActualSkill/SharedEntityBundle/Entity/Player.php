<?php

namespace ActualSkill\SharedEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\SharedEntityBundle\Entity\Player
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="birthday", type="date")
     */
    private $birthday;    
    
    /**
     * @var integer $height
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var integer $weight
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;
    
    /**
     * @var integer $isGoalkeeper
     *
     * @ORM\Column(name="isGoalkeeper", type="boolean")
     */
    private $isGoalkeeper;    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="players")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;    
    
    public function __construct() {
        parent::__construct();
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
     * @param ActualSkill\SharedEntityBundle\Entity\Country $country
     */
    public function setCountry(\ActualSkill\SharedEntityBundle\Entity\Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return ActualSkill\SharedEntityBundle\Entity\Country 
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
}