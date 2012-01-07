<?php

namespace ActualSkill\CoreBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\CoreBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comment
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
     * @var datetime $created_at
     * 
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @var text $comment
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="BaseEntity", inversedBy="comments")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    private $object;

    /**
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;    
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="parent")
     */
    private $children;    

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
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set comment
     *
     * @param text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return text 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set object_id
     *
     * @param integer $objectId
     */
    public function setObjectId($objectId)
    {
        $this->object_id = $objectId;
    }

    /**
     * Get object_id
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->object_id;
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
     * @return ActualSkill\CoreBundle\Entity\BaseEntity 
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
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set parent
     *
     * @param ActualSkill\CoreBundle\Entity\Comment $parent
     */
    public function setParent(\ActualSkill\CoreBundle\Entity\Comment $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return ActualSkill\CoreBundle\Entity\Comment 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param ActualSkill\CoreBundle\Entity\Comment $children
     */
    public function addComment(\ActualSkill\CoreBundle\Entity\Comment $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }
}