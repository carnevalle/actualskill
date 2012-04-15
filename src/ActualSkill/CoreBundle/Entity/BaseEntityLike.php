<?php

namespace ActualSkill\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\CoreBundle\Entity\BaseEntityLike
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BaseEntityLike
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
     *
     * @ORM\ManyToOne(targetEntity="BaseEntity", inversedBy="likes")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $object;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="likes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;    

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
}