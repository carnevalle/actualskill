<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\CoreBundle\Entity\FootballMatch
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FootballMatch extends BaseEntity
{

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     *
     * @ORM\OneToMany(targetEntity="PerformanceRating", mappedBy="match")
     */    
    protected $performanceRatings;      
    
    public function __construct() {
        parent::__construct();
        $this->performanceRatings = new ArrayCollection();
        
    }    

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
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