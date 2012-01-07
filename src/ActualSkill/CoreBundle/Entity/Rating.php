<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\CoreBundle\Entity\Rating
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rating
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
     * @var integer $rating
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Attribute", inversedBy="ratings")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id")
     */
    private $attribute;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ratings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="BaseEntity", inversedBy="ratings")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    private $object;



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
     * Set rating
     *
     * @param integer $rating
     */
    public function setRating($rating)
    {
        if($rating > 10){
            $rating = 10;
        }else if($rating < 0){
            $rating = 0;
        }
        
        $this->rating = $rating;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
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

    /**
     * Set user
     *
     * @param ActualSkill\CoreBundle\Entity\User $user
     */
    public function setUser(\ActualSkill\CoreBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return ActualSkill\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
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
}