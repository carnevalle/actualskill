<?php

namespace ActualSkill\CoreBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActualSkill\CoreBundle\Entity\PerformanceRating
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PerformanceRating
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
     * @ORM\ManyToOne(targetEntity="FootballMatch", inversedBy="performanceRatings")
     * @ORM\JoinColumn(name="match_id", referencedColumnName="id")
     */
    private $match;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="performanceRatings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="performanceRatings")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    private $player;

    /**
     * @var datetime $updated_at
     * 
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $created_at;
    
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
     * Set position
     *
     * @param ActualSkill\CoreBundle\Entity\FootballMatch  $match
     */
    public function setMatch(\ActualSkill\CoreBundle\Entity\FootballMatch $match)
    {
        $this->match = $match;
    }

    /**
     * Get position
     *
     * @return ActualSkill\CoreBundle\Entity\FootballMatch 
     */
    public function getMatch()
    {
        return $this->match;
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
     * Set player
     *
     * @param ActualSkill\CoreBundle\Entity\Player $player
     */
    public function setPlayer(\ActualSkill\CoreBundle\Entity\Player $player)
    {
        $this->player = $player;
    }

    /**
     * Get player
     *
     * @return ActualSkill\CoreBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}