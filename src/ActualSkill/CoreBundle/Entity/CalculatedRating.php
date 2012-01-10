<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\CoreBundle\Entity\CalculatedRating
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CalculatedRating
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $number_of_ratings
     *
     * @ORM\Column(name="number_of_ratings", type="integer")
     */
    private $number_of_ratings;

    /**
     * @var float $average_clean
     *
     * @ORM\Column(name="average_clean", type="decimal", precision=4, scale=2)
     */
    private $average_clean;

    /**
     * @var float $average_weighted
     *
     * @ORM\Column(name="average_weighted", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $average_weighted;

    /**
     * @var object $data
     *
     * @ORM\Column(name="data", type="object", nullable=true)
     */
    private $data;
 
    /**
     *
     * @ORM\ManyToOne(targetEntity="StatSheet", inversedBy="ratings")
     * @ORM\JoinColumn(name="$statsheet_id", referencedColumnName="id", onDelete="CASCADE")
     * 
     */     
    private $statsheet;    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Attribute", inversedBy="calculatedRatings")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id")
     */
    private $attribute;    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number_of_ratings
     *
     * @param integer $numberOfRatings
     */
    public function setNumberOfRatings($numberOfRatings)
    {
        $this->number_of_ratings = $numberOfRatings;
    }

    /**
     * Get number_of_ratings
     *
     * @return integer 
     */
    public function getNumberOfRatings()
    {
        return $this->number_of_ratings;
    }

    /**
     * Set average_clean
     *
     * @param float $averageClean
     */
    public function setAverageClean($averageClean)
    {
        $this->average_clean = $averageClean;
    }

    /**
     * Get average_clean
     *
     * @return float 
     */
    public function getAverageClean()
    {
        return $this->average_clean;
    }

    /**
     * Set average_weighted
     *
     * @param float $averageWeighted
     */
    public function setAverageWeighted($averageWeighted)
    {
        $this->average_weighted = $averageWeighted;
    }

    /**
     * Get average_weighted
     *
     * @return float 
     */
    public function getAverageWeighted()
    {
        return $this->average_weighted;
    }

    /**
     * Set data
     *
     * @param object $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get data
     *
     * @return object 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set statsheet
     *
     * @param ActualSkill\CoreBundle\Entity\StatSheet $statsheet
     */
    public function setStatsheet(\ActualSkill\CoreBundle\Entity\StatSheet $statsheet)
    {
        $this->statsheet = $statsheet;
    }

    /**
     * Get statsheet
     *
     * @return ActualSkill\CoreBundle\Entity\StatSheet 
     */
    public function getStatsheet()
    {
        return $this->statsheet;
    }

    /**
     * Set attribute
     *
     * @param ActualSkill\CoreBundle\Entity\Attribute $attribute
     */
    public function setAttribute(\ActualSkill\CoreBundle\Entity\Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Get attribute
     *
     * @return ActualSkill\CoreBundle\Entity\Attribute 
     */
    public function getAttribute()
    {
        return $this->attribute;
    }
    
    public function __toString() {
        return $this->attribute->getName();
    }    
}