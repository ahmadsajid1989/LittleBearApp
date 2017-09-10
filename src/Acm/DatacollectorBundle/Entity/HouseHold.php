<?php

namespace Acm\DatacollectorBundle\Entity;

use Acm\DatacollectorBundle\Utility\Utility;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * HouseHold
 */
class HouseHold
{
    /**
     * @var integer
     * @Groups({"group1"})
     */
    private $id;

    /**
     * @var boolean
     * @Groups({"group1"})
     */
    private $vulnerable;

    /**
     * @var string
     * @Groups({"group1"})
     */
    private $systemId;

    /**
     * @var string
     * @Groups({"group1"})
     */
    private $friendlyName;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $human;

    /**
     * @var \Acm\DatacollectorBundle\Entity\Location
     */
    private $location;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->human = new \Doctrine\Common\Collections\ArrayCollection();

    }

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
     * Set systemId
     *
     * @param string $systemId
     *
     * @return HouseHold
     */
    public function setSystemId($systemId)
    {
        $this->systemId = $systemId;

        return $this;
    }

    /**
     * Get systemId
     *
     * @return string
     */
    public function getSystemId()
    {
        return $this->systemId;
    }

    /**
     * @return mixed
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param mixed $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
    }

    /**
     * Set vulnerable
     *
     * @param boolean $vulnerable
     *
     * @return HouseHold
     */
    public function setVulnerable($vulnerable)
    {
        $this->vulnerable = $vulnerable;

        return $this;
    }

    /**
     * Get vulnerable
     *
     * @return boolean
     */
    public function getVulnerable()
    {
        return $this->vulnerable;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return HouseHold
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
     * Add human
     *
     * @param \Acm\DatacollectorBundle\Entity\Human $human
     *
     * @return HouseHold
     */
    public function addHuman(\Acm\DatacollectorBundle\Entity\Human $human)
    {
        $this->human[] = $human;

        return $this;
    }

    /**
     * Remove human
     *
     * @param \Acm\DatacollectorBundle\Entity\Human $human
     */
    public function removeHuman(\Acm\DatacollectorBundle\Entity\Human $human)
    {
        $this->human->removeElement($human);
    }

    /**
     * Get human
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHuman()
    {
        return $this->human;
    }

    /**
     * @ORM\PrePersist
     */
    public function setSystemIdValue()
    {
        return $this->systemId = Utility::generateCode();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        return $this->updatedAt = new \DateTime();
    }


    /**
     * Set location
     *
     * @param \Acm\DatacollectorBundle\Entity\Location $location
     *
     * @return HouseHold
     */
    public function setLocation(\Acm\DatacollectorBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \Acm\DatacollectorBundle\Entity\Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}
