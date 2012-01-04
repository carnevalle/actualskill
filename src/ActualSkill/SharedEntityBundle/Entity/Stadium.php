<?php

namespace ActualSkill\SharedEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;

/**
 * ActualSkill\SharedEntityBundle\Entity\Stadium
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stadium extends BaseEntity
{
     
    /**
     * @var integer $capacity
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     *
     * @ORM\OneToMany(targetEntity="Club", mappedBy="stadium")
     */
    protected $clubs;    
    
    public function __construct() {
        $this->clubs = new ArrayCollection();
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
     * @param ActualSkill\SharedEntityBundle\Entity\Club $clubs
     */
    public function addClubs(\ActualSkill\SharedEntityBundle\Entity\Club $clubs)
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