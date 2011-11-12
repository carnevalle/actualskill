<?php

namespace ActualSkill\SharedEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\SharedEntityBundle\Entity\Comment
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
     * @ORM\Column(name="created_at", type="datetime")
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
     * @ORM\ManyToOne(targetEntity="BaseEntity", inversedBy="comments")
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
}