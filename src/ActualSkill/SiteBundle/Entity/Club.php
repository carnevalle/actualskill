<?php

namespace ActualSkill\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\SiteBundle\Entity\Club
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Club extends BaseEntity
{
    
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $shortname
     *
     * @ORM\Column(name="shortname", type="string", length=3)
     */
    private $shortname;

    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="clubs")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;      
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Stadium", inversedBy="clubs")
     * @ORM\JoinColumn(name="stadium_id", referencedColumnName="id")
     */
    
    protected $stadium;    
    
    public function __construct() {
        parent::__construct();
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
     * Set shortname
     *
     * @param string $shortname
     */
    public function setShortname($shortname)
    {
        $this->shortname = $shortname;
    }

    /**
     * Get shortname
     *
     * @return string 
     */
    public function getShortname()
    {
        return $this->shortname;
    }
    
    public function __toString() {
        return $this->name;
    }

    /**
     * Set country
     *
     * @param ActualSkill\SiteBundle\Entity\Country $country
     */
    public function setCountry(\ActualSkill\SiteBundle\Entity\Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return ActualSkill\SiteBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set stadium
     *
     * @param ActualSkill\SiteBundle\Entity\Stadium $stadium
     */
    public function setStadium(\ActualSkill\SiteBundle\Entity\Stadium $stadium)
    {
        $this->stadium = $stadium;
    }

    /**
     * Get stadium
     *
     * @return ActualSkill\SiteBundle\Entity\Stadium 
     */
    public function getStadium()
    {
        return $this->stadium;
    }
}