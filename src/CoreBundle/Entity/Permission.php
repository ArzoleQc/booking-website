<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\PermissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PermissionRepository::class)
 */
class Permission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=UserOrganisation::class, mappedBy="permissions")
     */
    private $userOrganisations;

    /**
     * @ORM\ManyToMany(targetEntity=PermissionGroup::class, mappedBy="permissions")
     */
    private $permissionGroups;

    public function __construct()
    {
        $this->userOrganisations = new ArrayCollection();
        $this->permissionGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|UserOrganisation[]
     */
    public function getUserOrganisations(): Collection
    {
        return $this->userOrganisations;
    }

    public function addUserOrganisation(UserOrganisation $userOrganisation): self
    {
        if (!$this->userOrganisations->contains($userOrganisation)) {
            $this->userOrganisations[] = $userOrganisation;
            $userOrganisation->addPermission($this);
        }

        return $this;
    }

    public function removeUserOrganisation(UserOrganisation $userOrganisation): self
    {
        if ($this->userOrganisations->removeElement($userOrganisation)) {
            $userOrganisation->removePermission($this);
        }

        return $this;
    }

    /**
     * @return Collection|PermissionGroup[]
     */
    public function getPermissionGroups(): Collection
    {
        return $this->permissionGroups;
    }

    public function addPermissionGroup(PermissionGroup $permissionGroup): self
    {
        if (!$this->permissionGroups->contains($permissionGroup)) {
            $this->permissionGroups[] = $permissionGroup;
            $permissionGroup->addPermission($this);
        }

        return $this;
    }

    public function removePermissionGroup(PermissionGroup $permissionGroup): self
    {
        if ($this->permissionGroups->removeElement($permissionGroup)) {
            $permissionGroup->removePermission($this);
        }

        return $this;
    }
}
