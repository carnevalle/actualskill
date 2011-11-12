<?php

namespace ActualSkill\SharedEntityBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\SharedEntityBundle\Entity\User
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
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */        
    protected $comments;    
    
    public function __construct()
    {
        parent::__construct();
        
        $this->ratings = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }
    
    /**
     * Set nationality
     *
     * @param ActualSkill\SharedEntityBundle\Entity\Country $nationality
     */
    public function setNationality(\ActualSkill\SharedEntityBundle\Entity\Country $nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * Get nationality
     *
     * @return ActualSkill\SharedEntityBundle\Entity\Country 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set club
     *
     * @param ActualSkill\SharedEntityBundle\Entity\Club $club
     */
    public function setClub(\ActualSkill\SharedEntityBundle\Entity\Club $club)
    {
        $this->club = $club;
    }

    /**
     * Get club
     *
     * @return ActualSkill\SharedEntityBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Add ratings
     *
     * @param ActualSkill\SharedEntityBundle\Entity\Rating $ratings
     */
    public function addRatings(\ActualSkill\SharedEntityBundle\Entity\Rating $ratings)
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
     * @param ActualSkill\SharedEntityBundle\Entity\Comment $comments
     */
    public function addComments(\ActualSkill\SharedEntityBundle\Entity\Comment $comments)
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
}