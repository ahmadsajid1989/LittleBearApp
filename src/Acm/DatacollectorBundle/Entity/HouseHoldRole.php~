<?php

namespace Acm\DatacollectorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * HouseHoldRole
 */
class HouseHoldRole
{
    /**
     * @var integer
     * @Groups({"group1"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"group1"})
     */
    private $role;

    /**
     * @var string
     * @Groups({"group1"})
     */
    private $roleSlug;

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
     * Set role
     *
     * @param string $role
     *
     * @return HouseHoldRole
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set roleSlug
     *
     * @param string $roleSlug
     *
     * @return HouseHoldRole
     */
    public function setRoleSlug($roleSlug)
    {
        $this->roleSlug = $roleSlug;

        return $this;
    }

    /**
     * Get roleSlug
     *
     * @return string
     */
    public function getRoleSlug()
    {
        return $this->roleSlug;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $human;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->human = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add human
     *
     * @param \Acm\DatacollectorBundle\Entity\Human $human
     *
     * @return HouseHoldRole
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
     * @return string
     */
    public function __toString()
    {
        return $this->role;
    }


}
