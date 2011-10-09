<?php

namespace ActualSkill\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;

/**
 * ActualSkill\SiteBundle\Entity\Stadium
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stadium extends BaseEntity
{
     
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $capacity
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     *
     * @ORM\OneToMany(targetEntity="Club", mappedBy="stadium_id")
     */
    protected $clubs;    
    
    public function __construct() {
        $this->clubs = new ArrayCollection();
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
     * Set capacity
     *
     * @param integer $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Add clubs
     *
     * @param ActualSkill\SiteBundle\Entity\Club $clubs
     */
    public function addClubs(\ActualSkill\SiteBundle\Entity\Club $clubs)
    {
        $this->clubs[] = $clubs;
    }

    /**
     * Get clubs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClubs()
    {
        return $this->clubs;
    }
    
    public function __toString() {
        return $this->name;
    }
}