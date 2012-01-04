<?php

namespace ActualSkill\SharedEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\SharedEntityBundle\Entity\Club
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Club extends BaseEntity
{
    
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
     * @ORM\OneToMany(targetEntity="Player", mappedBy="club")
     */    
    private $players;    
    
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
     * Set players
     *
     * @param ActualSkill\SharedEntityBundle\Entity\Player $player
     */
    public function setPlayers(\ActualSkill\SharedEntityBundle\Entity\Player $players)
    {
        $this->players = $players;
    }

    /**
     * Get player
     *
     * @return ActualSkill\SharedEntityBundle\Entity\Player 
     */
    public function getPlayers()
    {
        return $this->players;
    }    
    
    /**
     * Set stadium
     *
     * @param ActualSkill\SharedEntityBundle\Entity\Stadium $stadium
     */
    public function setStadium(\ActualSkill\SharedEntityBundle\Entity\Stadium $stadium)
    {
        $this->stadium = $stadium;
    }

    /**
     * Get stadium
     *
     * @return ActualSkill\SharedEntityBundle\Entity\Stadium 
     */
    public function getStadium()
    {
        return $this->stadium;
    }
}