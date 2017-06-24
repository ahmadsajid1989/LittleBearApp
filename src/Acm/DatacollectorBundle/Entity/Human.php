<?php

namespace Acm\DatacollectorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acm\DatacollectorBundle\Utility\Utility;

/**
 * Human
 */
class Human
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $fullname;

    /**
     * @var string
     */
    private $unique_id;

    /**
     * @var \DateTime
     */
    private $dateofbirth;

    /**
     * @var boolean
     */
    private $dob_flag;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var boolean
     */
    private $verified;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Human
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set uniqueId
     *
     * @param string $uniqueId
     *
     * @return Human
     */
    public function setUniqueId($uniqueId)
    {
        $this->unique_id = $uniqueId;

        return $this;
    }

    /**
     * Get uniqueId
     *
     * @return string
     */
    public function getUniqueId()
    {
        return $this->unique_id;
    }

    /**
     * Set dateofbirth
     *
     * @param \DateTime $dateofbirth
     *
     * @return Human
     */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    /**
     * Get dateofbirth
     *
     * @return \DateTime
     */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set dobFlag
     *
     * @param boolean $dobFlag
     *
     * @return Human
     */
    public function setDobFlag($dobFlag)
    {
        $this->dob_flag = $dobFlag;

        return $this;
    }

    /**
     * Get dobFlag
     *
     * @return boolean
     */
    public function getDobFlag()
    {
        return $this->dob_flag;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Human
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Human
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Human
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set verified
     *
     * @param boolean $verified
     *
     * @return Human
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Human
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Human
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
       $this->created_at = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setSystemIdValue()
    {
        $this->unique_id = Utility::generateCode();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }
}
