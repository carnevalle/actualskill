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
     * @var float $rating
     *
     * @ORM\Column(name="rating", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $rating;

    /**
     *
     * @ORM\ManyToOne(targetEntity="BaseEntity", inversedBy="statsheets")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
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
     * Set rating
     *
     * @param float $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * Get rating
     *
     * @return float 
     */
    public function getRating()
    {
        return $this->rating;
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
}