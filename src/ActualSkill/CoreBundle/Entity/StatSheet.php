<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ActualSkill\CoreBundle\Entity\StatSheet
 *
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(name="one_per_day", columns={"object_id", "created_at"})})
 * @ORM\Entity
 */
class StatSheet
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
     * @var date $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="date")
     */
    private $created_at;

    /**
     * @var float $attributeRatingClean
     *
     * @ORM\Column(name="attribute_rating_clean", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $attributeRatingClean;

    /**
     * @var float $attributeRatingWeighted
     *
     * @ORM\Column(name="attribute_rating_weighted", type="decimal", precision=4, scale=2, nullable=true)
     */    
    private $attributeRatingWeighted;
    
    /**
     * @var integer $attributes_total
     *
     * @ORM\Column(name="attributes_total", type="integer")
     */    
    private $attributes_total;
    
    /**
     * @var integer $attributes_rated
     *
     * @ORM\Column(name="attributes_rated", type="integer")
     */     
    private $attributes_rated;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="BaseEntity", inversedBy="statsheets")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */    
    private $object;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="CalculatedRating", mappedBy="statsheet", cascade={"persist"})
     */ 
    private $ratings;
    
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
     * Set created_at
     *
     * @param date $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return date 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    
    /**
     * Set object
     *
     * @param ActualSkill\CoreBundle\Entity\BaseEntity $object
     */
    public function setObject(\ActualSkill\CoreBundle\Entity\BaseEntity $object)
    {
        $this->object = $object;
    }

    /**
     * Get object
     *
     * @return ActualSkill\CoreBundle\Entity\BaseEntity 
     */
    public function getObject()
    {
        return $this->object;
    }
    public function __construct()
    {
        $this->ratings = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add ratings
     *
     * @param ActualSkill\CoreBundle\Entity\CalculatedRating $ratings
     */
    public function addCalculatedRating(\ActualSkill\CoreBundle\Entity\CalculatedRating $ratings)
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
     * Set attributeRatingClean
     *
     * @param decimal $attributeRatingClean
     */
    public function setAttributeRatingClean($attributeRatingClean)
    {
        $this->attributeRatingClean = $attributeRatingClean;
    }

    /**
     * Get attributeRatingClean
     *
     * @return decimal 
     */
    public function getAttributeRatingClean()
    {
        return $this->attributeRatingClean;
    }

    /**
     * Set attributeRatingWeighted
     *
     * @param decimal $attributeRatingWeighted
     */
    public function setAttributeRatingWeighted($attributeRatingWeighted)
    {
        $this->attributeRatingWeighted = $attributeRatingWeighted;
    }

    /**
     * Get attributeRatingWeighted
     *
     * @return decimal 
     */
    public function getAttributeRatingWeighted()
    {
        return $this->attributeRatingWeighted;
    }

    /**
     * Set attributes_total
     *
     * @param integer $attributesTotal
     */
    public function setAttributesTotal($attributesTotal)
    {
        $this->attributes_total = $attributesTotal;
    }

    /**
     * Get attributes_total
     *
     * @return integer 
     */
    public function getAttributesTotal()
    {
        return $this->attributes_total;
    }

    /**
     * Set attributes_rated
     *
     * @param integer $attributesRated
     */
    public function setAttributesRated($attributesRated)
    {
        $this->attributes_rated = $attributesRated;
    }

    /**
     * Get attributes_rated
     *
     * @return integer 
     */
    public function getAttributesRated()
    {
        return $this->attributes_rated;
    }
}