<?php

namespace Acm\DatacollectorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acm\DatacollectorBundle\Utility\Utility;

/**
 * Human.
 */
class Human
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $govRegisteredNumber;

    /**
     * @var string
     */
    private $uniqueId;

    /**
     * @var \DateTime
     */
    private $dateOfBirth;

    /**
     * @var bool
     */
    private $dobFlag;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     *
     */

    private $maritalStatus;
    /**
     * @var string
     */
    private $picture;

    /**
     * @var bool
     */
    private $verified;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Acm\DatacollectorBundle\Entity\HouseHold
     */
    private $houseHold;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getGovRegisteredNumber()
    {
        return $this->govRegisteredNumber;
    }

    /**
     * @param string $govRegisteredNumber
     */
    public function setGovRegisteredNumber($govRegisteredNumber)
    {
        $this->govRegisteredNumber = $govRegisteredNumber;
    }


    /**
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * @param string $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return bool
     */
    public function isDobFlag()
    {
        return $this->dobFlag;
    }

    /**
     * @param bool $dobFlag
     */
    public function setDobFlag($dobFlag)
    {
        $this->dobFlag = $dobFlag;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return bool
     */
    public function isVerified()
    {
        return $this->verified;
    }

    /**
     * @param bool $verified
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setSystemIdValue()
    {
        $this->uniqueId = Utility::generateCode();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set houseHold.
     *
     * @param \Acm\DatacollectorBundle\Entity\HouseHold $houseHold
     *
     * @return Human
     */
    public function setHouseHold(\Acm\DatacollectorBundle\Entity\HouseHold $houseHold = null)
    {
        $this->houseHold = $houseHold;

        return $this;
    }

    /**
     * Get houseHold.
     *
     * @return \Acm\DatacollectorBundle\Entity\HouseHold
     */
    public function getHouseHold()
    {
        return $this->houseHold;
    }

    /**
     * Get dobFlag.
     *
     * @return bool
     */
    public function getDobFlag()
    {
        return $this->dobFlag;
    }

    /**
     * Get verified.
     *
     * @return bool
     */
    public function getVerified()
    {
        return $this->verified;
    }
    /**
     * @var \Acm\DatacollectorBundle\Entity\HouseHoldRole
     */
    private $houseHoldRole;

    /**
     * Set houseHoldRole.
     *
     * @param \Acm\DatacollectorBundle\Entity\HouseHoldRole $houseHoldRole
     *
     * @return Human
     */
    public function setHouseHoldRole(\Acm\DatacollectorBundle\Entity\HouseHoldRole $houseHoldRole = null)
    {
        $this->houseHoldRole = $houseHoldRole;

        return $this;
    }

    /**
     * Get houseHoldRole.
     *
     * @return \Acm\DatacollectorBundle\Entity\HouseHoldRole
     */
    public function getHouseHoldRole()
    {
        return $this->houseHoldRole;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * @param mixed $maritalStatus
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;
    }

}
