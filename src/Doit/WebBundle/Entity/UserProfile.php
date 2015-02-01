<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProfile
 *
 * @ORM\Table(name="user_profile", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class UserProfile
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
     * @var string
     *
     * @ORM\Column(name="real_name", type="string", length=20, nullable=false)
     */
    private $realName;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar_small", type="string", length=255, nullable=false)
     */
    private $avatarSmall;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar_middle", type="string", length=255, nullable=false)
     */
    private $avatarMiddle;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar_big", type="string", length=255, nullable=false)
     */
    private $avatarBig;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="birthday", type="string", length=10, nullable=false)
     */
    private $birthday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sex", type="boolean", nullable=false)
     */
    private $sex;

    /**
     * @var integer
     *
     * @ORM\Column(name="hometown_province", type="smallint", nullable=false)
     */
    private $hometownProvince;

    /**
     * @var integer
     *
     * @ORM\Column(name="hometown_city", type="smallint", nullable=false)
     */
    private $hometownCity;

    /**
     * @var integer
     *
     * @ORM\Column(name="qq", type="bigint", nullable=false)
     */
    private $qq;

    /**
     * @var integer
     *
     * @ORM\Column(name="province", type="smallint", nullable=false)
     */
    private $province;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="smallint", nullable=false)
     */
    private $city;

    /**
     * @var boolean
     *
     * @ORM\Column(name="blood", type="boolean", nullable=false)
     */
    private $blood;

    /**
     * @var boolean
     *
     * @ORM\Column(name="marriage", type="boolean", nullable=false)
     */
    private $marriage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bodytype", type="boolean", nullable=false)
     */
    private $bodytype;

    /**
     * @var boolean
     *
     * @ORM\Column(name="work_status", type="boolean", nullable=false)
     */
    private $workStatus;



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
     * @return UserProfile
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
     * Set realName
     *
     * @param string $realName
     * @return UserProfile
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;

        return $this;
    }

    /**
     * Get realName
     *
     * @return string 
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * Set avatarSmall
     *
     * @param string $avatarSmall
     * @return UserProfile
     */
    public function setAvatarSmall($avatarSmall)
    {
        $this->avatarSmall = $avatarSmall;

        return $this;
    }

    /**
     * Get avatarSmall
     *
     * @return string 
     */
    public function getAvatarSmall()
    {
        return $this->avatarSmall;
    }

    /**
     * Set avatarMiddle
     *
     * @param string $avatarMiddle
     * @return UserProfile
     */
    public function setAvatarMiddle($avatarMiddle)
    {
        $this->avatarMiddle = $avatarMiddle;

        return $this;
    }

    /**
     * Get avatarMiddle
     *
     * @return string 
     */
    public function getAvatarMiddle()
    {
        return $this->avatarMiddle;
    }

    /**
     * Set avatarBig
     *
     * @param string $avatarBig
     * @return UserProfile
     */
    public function setAvatarBig($avatarBig)
    {
        $this->avatarBig = $avatarBig;

        return $this;
    }

    /**
     * Get avatarBig
     *
     * @return string 
     */
    public function getAvatarBig()
    {
        return $this->avatarBig;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return UserProfile
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     * @return UserProfile
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set sex
     *
     * @param boolean $sex
     * @return UserProfile
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set hometownProvince
     *
     * @param integer $hometownProvince
     * @return UserProfile
     */
    public function setHometownProvince($hometownProvince)
    {
        $this->hometownProvince = $hometownProvince;

        return $this;
    }

    /**
     * Get hometownProvince
     *
     * @return integer 
     */
    public function getHometownProvince()
    {
        return $this->hometownProvince;
    }

    /**
     * Set hometownCity
     *
     * @param integer $hometownCity
     * @return UserProfile
     */
    public function setHometownCity($hometownCity)
    {
        $this->hometownCity = $hometownCity;

        return $this;
    }

    /**
     * Get hometownCity
     *
     * @return integer 
     */
    public function getHometownCity()
    {
        return $this->hometownCity;
    }

    /**
     * Set qq
     *
     * @param integer $qq
     * @return UserProfile
     */
    public function setQq($qq)
    {
        $this->qq = $qq;

        return $this;
    }

    /**
     * Get qq
     *
     * @return integer 
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * Set province
     *
     * @param integer $province
     * @return UserProfile
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return integer 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set city
     *
     * @param integer $city
     * @return UserProfile
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set blood
     *
     * @param boolean $blood
     * @return UserProfile
     */
    public function setBlood($blood)
    {
        $this->blood = $blood;

        return $this;
    }

    /**
     * Get blood
     *
     * @return boolean 
     */
    public function getBlood()
    {
        return $this->blood;
    }

    /**
     * Set marriage
     *
     * @param boolean $marriage
     * @return UserProfile
     */
    public function setMarriage($marriage)
    {
        $this->marriage = $marriage;

        return $this;
    }

    /**
     * Get marriage
     *
     * @return boolean 
     */
    public function getMarriage()
    {
        return $this->marriage;
    }

    /**
     * Set bodytype
     *
     * @param boolean $bodytype
     * @return UserProfile
     */
    public function setBodytype($bodytype)
    {
        $this->bodytype = $bodytype;

        return $this;
    }

    /**
     * Get bodytype
     *
     * @return boolean 
     */
    public function getBodytype()
    {
        return $this->bodytype;
    }

    /**
     * Set workStatus
     *
     * @param boolean $workStatus
     * @return UserProfile
     */
    public function setWorkStatus($workStatus)
    {
        $this->workStatus = $workStatus;

        return $this;
    }

    /**
     * Get workStatus
     *
     * @return boolean 
     */
    public function getWorkStatus()
    {
        return $this->workStatus;
    }
}
