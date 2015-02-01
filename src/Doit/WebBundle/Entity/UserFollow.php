<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserFollow
 *
 * @ORM\Table(name="user_follow", indexes={@ORM\Index(name="followed_uid", columns={"followed_uid"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class UserFollow
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="followed_uid", type="integer", nullable=false)
     */
    private $followedUid;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;



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
     * Set followedUid
     *
     * @param integer $followedUid
     * @return UserFollow
     */
    public function setFollowedUid($followedUid)
    {
        $this->followedUid = $followedUid;

        return $this;
    }

    /**
     * Get followedUid
     *
     * @return integer 
     */
    public function getFollowedUid()
    {
        return $this->followedUid;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return UserFollow
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return UserFollow
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
