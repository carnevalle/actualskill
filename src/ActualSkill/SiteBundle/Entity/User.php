<?php

namespace ActualSkill\SiteBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\SiteBundle\Entity\User
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
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="object_id")
     */    
    protected $ratings;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="object_id")
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
     * @param ActualSkill\SiteBundle\Entity\Country $nationality
     */
    public function setNationality(\ActualSkill\SiteBundle\Entity\Country $nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * Get nationality
     *
     * @return ActualSkill\SiteBundle\Entity\Country 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set club
     *
     * @param ActualSkill\SiteBundle\Entity\Club $club
     */
    public function setClub(\ActualSkill\SiteBundle\Entity\Club $club)
    {
        $this->club = $club;
    }

    /**
     * Get club
     *
     * @return ActualSkill\SiteBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
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
}