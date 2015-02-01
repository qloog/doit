<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="activate_code", type="string", length=32, nullable=false)
     */
    private $activateCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="activate_expire", type="datetime", nullable=false)
     */
    private $activateExpire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_time", type="datetime", nullable=false)
     */
    private $registerTime;

    /**
     * @var string
     *
     * @ORM\Column(name="register_ip", type="string", length=15, nullable=false)
     */
    private $registerIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login_time", type="datetime", nullable=false)
     */
    private $lastLoginTime;

    /**
     * @var string
     *
     * @ORM\Column(name="last_login_ip", type="string", length=20, nullable=false)
     */
    private $lastLoginIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_times", type="integer", nullable=false)
     */
    private $loginTimes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_time", type="datetime", nullable=false)
     */
    private $updateTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;



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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set activateCode
     *
     * @param string $activateCode
     * @return User
     */
    public function setActivateCode($activateCode)
    {
        $this->activateCode = $activateCode;

        return $this;
    }

    /**
     * Get activateCode
     *
     * @return string 
     */
    public function getActivateCode()
    {
        return $this->activateCode;
    }

    /**
     * Set activateExpire
     *
     * @param \DateTime $activateExpire
     * @return User
     */
    public function setActivateExpire($activateExpire)
    {
        $this->activateExpire = $activateExpire;

        return $this;
    }

    /**
     * Get activateExpire
     *
     * @return \DateTime 
     */
    public function getActivateExpire()
    {
        return $this->activateExpire;
    }

    /**
     * Set registerTime
     *
     * @param \DateTime $registerTime
     * @return User
     */
    public function setRegisterTime($registerTime)
    {
        $this->registerTime = $registerTime;

        return $this;
    }

    /**
     * Get registerTime
     *
     * @return \DateTime 
     */
    public function getRegisterTime()
    {
        return $this->registerTime;
    }

    /**
     * Set registerIp
     *
     * @param string $registerIp
     * @return User
     */
    public function setRegisterIp($registerIp)
    {
        $this->registerIp = $registerIp;

        return $this;
    }

    /**
     * Get registerIp
     *
     * @return string 
     */
    public function getRegisterIp()
    {
        return $this->registerIp;
    }

    /**
     * Set lastLoginTime
     *
     * @param \DateTime $lastLoginTime
     * @return User
     */
    public function setLastLoginTime($lastLoginTime)
    {
        $this->lastLoginTime = $lastLoginTime;

        return $this;
    }

    /**
     * Get lastLoginTime
     *
     * @return \DateTime 
     */
    public function getLastLoginTime()
    {
        return $this->lastLoginTime;
    }

    /**
     * Set lastLoginIp
     *
     * @param string $lastLoginIp
     * @return User
     */
    public function setLastLoginIp($lastLoginIp)
    {
        $this->lastLoginIp = $lastLoginIp;

        return $this;
    }

    /**
     * Get lastLoginIp
     *
     * @return string 
     */
    public function getLastLoginIp()
    {
        return $this->lastLoginIp;
    }

    /**
     * Set loginTimes
     *
     * @param integer $loginTimes
     * @return User
     */
    public function setLoginTimes($loginTimes)
    {
        $this->loginTimes = $loginTimes;

        return $this;
    }

    /**
     * Get loginTimes
     *
     * @return integer 
     */
    public function getLoginTimes()
    {
        return $this->loginTimes;
    }

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     * @return User
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime 
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return User
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
