<?php

namespace Acm\DatacollectorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Location
 */
class Location
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $addressVillage;

    /**
     * @var string
     */
    private $addressUpazilla;

    /**
     * @var string
     */
    private $addressDistrict;

    /**
     * @var string
     */
    private $addressDivision;

    /**
     * @var string
     */
    private $hostAddressVillage;

    /**
     * @var string
     */
    private $hostAddressUpazilla;

    /**
     * @var string
     */
    private $hostAddressDistrict;

    /**
     * @var string
     */
    private $hostAddressDivision;

    /**
     * @var string
     */
    private $campName;

    /**
     * @var string
     */
    private $campBlock;

    /**
     * @var string
     */
    private $campWard;

    /**
     * @var string
     */
    private $gpsLatitude;

    /**
     * @var string
     */
    private $gpsLongitude;

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
    private $house_hold;


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
     * Set addressVillage
     *
     * @param string $addressVillage
     *
     * @return Location
     */
    public function setAddressVillage($addressVillage)
    {
        $this->addressVillage = $addressVillage;

        return $this;
    }

    /**
     * Get addressVillage
     *
     * @return string
     */
    public function getAddressVillage()
    {
        return $this->addressVillage;
    }

    /**
     * Set addressUpazilla
     *
     * @param string $addressUpazilla
     *
     * @return Location
     */
    public function setAddressUpazilla($addressUpazilla)
    {
        $this->addressUpazilla = $addressUpazilla;

        return $this;
    }

    /**
     * Get addressUpazilla
     *
     * @return string
     */
    public function getAddressUpazilla()
    {
        return $this->addressUpazilla;
    }

    /**
     * Set addressDistrict
     *
     * @param string $addressDistrict
     *
     * @return Location
     */
    public function setAddressDistrict($addressDistrict)
    {
        $this->addressDistrict = $addressDistrict;

        return $this;
    }

    /**
     * Get addressDistrict
     *
     * @return string
     */
    public function getAddressDistrict()
    {
        return $this->addressDistrict;
    }

    /**
     * Set addressDivision
     *
     * @param string $addressDivision
     *
     * @return Location
     */
    public function setAddressDivision($addressDivision)
    {
        $this->addressDivision = $addressDivision;

        return $this;
    }

    /**
     * Get addressDivision
     *
     * @return string
     */
    public function getAddressDivision()
    {
        return $this->addressDivision;
    }

    /**
     * Set hostAddressVillage
     *
     * @param string $hostAddressVillage
     *
     * @return Location
     */
    public function setHostAddressVillage($hostAddressVillage)
    {
        $this->hostAddressVillage = $hostAddressVillage;

        return $this;
    }

    /**
     * Get hostAddressVillage
     *
     * @return string
     */
    public function getHostAddressVillage()
    {
        return $this->hostAddressVillage;
    }

    /**
     * Set hostAddressUpazilla
     *
     * @param string $hostAddressUpazilla
     *
     * @return Location
     */
    public function setHostAddressUpazilla($hostAddressUpazilla)
    {
        $this->hostAddressUpazilla = $hostAddressUpazilla;

        return $this;
    }

    /**
     * Get hostAddressUpazilla
     *
     * @return string
     */
    public function getHostAddressUpazilla()
    {
        return $this->hostAddressUpazilla;
    }

    /**
     * Set hostAddressDistrict
     *
     * @param string $hostAddressDistrict
     *
     * @return Location
     */
    public function setHostAddressDistrict($hostAddressDistrict)
    {
        $this->hostAddressDistrict = $hostAddressDistrict;

        return $this;
    }

    /**
     * Get hostAddressDistrict
     *
     * @return string
     */
    public function getHostAddressDistrict()
    {
        return $this->hostAddressDistrict;
    }

    /**
     * Set hostAddressDivision
     *
     * @param string $hostAddressDivision
     *
     * @return Location
     */
    public function setHostAddressDivision($hostAddressDivision)
    {
        $this->hostAddressDivision = $hostAddressDivision;

        return $this;
    }

    /**
     * Get hostAddressDivision
     *
     * @return string
     */
    public function getHostAddressDivision()
    {
        return $this->hostAddressDivision;
    }

    /**
     * Set campName
     *
     * @param string $campName
     *
     * @return Location
     */
    public function setCampName($campName)
    {
        $this->campName = $campName;

        return $this;
    }

    /**
     * Get campName
     *
     * @return string
     */
    public function getCampName()
    {
        return $this->campName;
    }

    /**
     * Set campBlock
     *
     * @param string $campBlock
     *
     * @return Location
     */
    public function setCampBlock($campBlock)
    {
        $this->campBlock = $campBlock;

        return $this;
    }

    /**
     * Get campBlock
     *
     * @return string
     */
    public function getCampBlock()
    {
        return $this->campBlock;
    }

    /**
     * Set campWard
     *
     * @param string $campWard
     *
     * @return Location
     */
    public function setCampWard($campWard)
    {
        $this->campWard = $campWard;

        return $this;
    }

    /**
     * Get campWard
     *
     * @return string
     */
    public function getCampWard()
    {
        return $this->campWard;
    }

    /**
     * Set gpsLatitude
     *
     * @param string $gpsLatitude
     *
     * @return Location
     */
    public function setGpsLatitude($gpsLatitude)
    {
        $this->gpsLatitude = $gpsLatitude;

        return $this;
    }

    /**
     * Get gpsLatitude
     *
     * @return string
     */
    public function getGpsLatitude()
    {
        return $this->gpsLatitude;
    }

    /**
     * Set gpsLongitude
     *
     * @param string $gpsLongitude
     *
     * @return Location
     */
    public function setGpsLongitude($gpsLongitude)
    {
        $this->gpsLongitude = $gpsLongitude;

        return $this;
    }

    /**
     * Get gpsLongitude
     *
     * @return string
     */
    public function getGpsLongitude()
    {
        return $this->gpsLongitude;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Location
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Location
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set houseHold
     *
     * @param \Acm\DatacollectorBundle\Entity\HouseHold $houseHold
     *
     * @return Location
     */
    public function setHouseHold(\Acm\DatacollectorBundle\Entity\HouseHold $houseHold = null)
    {
        $this->house_hold = $houseHold;

        return $this;
    }

    /**
     * Get houseHold
     *
     * @return \Acm\DatacollectorBundle\Entity\HouseHold
     */
    public function getHouseHold()
    {
        return $this->house_hold;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }
}
