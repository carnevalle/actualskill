<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;

/**
 * ActualSkill\CoreBundle\Entity\Stadium
 *
 * @ORM\HasLifecycleCallbacks()
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
    * @ORM\postLoad
    */    
    public function setObjectTypeOnLoad(){
        
        $this->type="stadium";
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
     * @param ActualSkill\CoreBundle\Entity\Club $clubs
     */
    public function addClubs(\ActualSkill\CoreBundle\Entity\Club $clubs)
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