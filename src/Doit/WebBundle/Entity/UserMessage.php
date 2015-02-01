<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserMessage
 *
 * @ORM\Table(name="user_message")
 * @ORM\Entity
 */
class UserMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="msg_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $msgId;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_uid", type="integer", nullable=false)
     */
    private $fromUid;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_uid", type="integer", nullable=true)
     */
    private $toUid;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=false)
     */
    private $createTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;



    /**
     * Get msgId
     *
     * @return integer 
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Set fromUid
     *
     * @param integer $fromUid
     * @return UserMessage
     */
    public function setFromUid($fromUid)
    {
        $this->fromUid = $fromUid;

        return $this;
    }

    /**
     * Get fromUid
     *
     * @return integer 
     */
    public function getFromUid()
    {
        return $this->fromUid;
    }

    /**
     * Set toUid
     *
     * @param integer $toUid
     * @return UserMessage
     */
    public function setToUid($toUid)
    {
        $this->toUid = $toUid;

        return $this;
    }

    /**
     * Get toUid
     *
     * @return integer 
     */
    public function getToUid()
    {
        return $this->toUid;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return UserMessage
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return UserMessage
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return UserMessage
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
