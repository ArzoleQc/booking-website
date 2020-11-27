<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\UserOrganisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserOrganisationRepository::class)
 */
class UserOrganisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userOrganisations")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=UserOrganisationInfo::class, inversedBy="userOrganisation", cascade={"persist", "remove"})
     */
    private $userOrganisationInfo;

    /**
     * @ORM\ManyToOne(targetEntity=PermissionGroup::class, inversedBy="userOrganisations")
     */
    private $permissionGroup;

    /**
     * @ORM\ManyToMany(targetEntity=Permission::class, inversedBy="userOrganisations")
     */
    private $permissions;

    /**
     * @ORM\ManyToOne(targetEntity=Organisation::class, inversedBy="userOrganisations")
     */
    private $organisation;

    public function __construct()
    {
        $this->permissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUserOrganisationInfo(): ?UserOrganisationInfo
    {
        return $this->userOrganisationInfo;
    }

    public function setUserOrganisationInfo(?UserOrganisationInfo $userOrganisationInfo): self
    {
        $this->userOrganisationInfo = $userOrganisationInfo;

        return $this;
    }

    public function getPermissionGroup(): ?PermissionGroup
    {
        return $this->permissionGroup;
    }

    public function setPermissionGroup(?PermissionGroup $permissionGroup): self
    {
        $this->permissionGroup = $permissionGroup;

        return $this;
    }

    /**
     * @return Collection|Permission[]
     */
    public function getPermissions(): Collection
    {
        return $this->permissions;
    }

    public function addPermission(Permission $permission): self
    {
        if (!$this->permissions->contains($permission)) {
            $this->permissions[] = $permission;
        }

        return $this;
    }

    public function removePermission(Permission $permission): self
    {
        $this->permissions->removeElement($permission);

        return $this;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organisation $organisation): self
    {
        $this->organisation = $organisation;

        return $this;
    }
}
