<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserStat
 *
 * @ORM\Table(name="user_stat", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class UserStat
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
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="follow_num", type="integer", nullable=false)
     */
    private $followNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="fans_num", type="integer", nullable=false)
     */
    private $fansNum;



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
     * Set userId
     *
     * @param integer $userId
     * @return UserStat
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
     * Set followNum
     *
     * @param integer $followNum
     * @return UserStat
     */
    public function setFollowNum($followNum)
    {
        $this->followNum = $followNum;

        return $this;
    }

    /**
     * Get followNum
     *
     * @return integer 
     */
    public function getFollowNum()
    {
        return $this->followNum;
    }

    /**
     * Set fansNum
     *
     * @param integer $fansNum
     * @return UserStat
     */
    public function setFansNum($fansNum)
    {
        $this->fansNum = $fansNum;

        return $this;
    }

    /**
     * Get fansNum
     *
     * @return integer 
     */
    public function getFansNum()
    {
        return $this->fansNum;
    }
}
