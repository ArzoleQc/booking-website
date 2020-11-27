<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\PermissionGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PermissionGroupRepository::class)
 * @ORM\Table(name="`group`")
 */
class PermissionGroup
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=UserOrganisation::class, mappedBy="permissionGroup")
     */
    private $userOrganisations;

    /**
     * @ORM\ManyToMany(targetEntity=Permission::class, inversedBy="permissionGroups")
     */
    private $permissions;

    /**
     * @ORM\ManyToOne(targetEntity=Organisation::class, inversedBy="permissionGroups")
     */
    private $organisation;

    /**
     * @ORM\OneToMany(targetEntity=UserEmployee::class, mappedBy="permissionGroup")
     */
    private $userEmployees;

    public function __construct()
    {
        $this->userOrganisations = new ArrayCollection();
        $this->permissions = new ArrayCollection();
        $this->userEmployees = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $userOrganisation->setPermissionGroup($this);
        }

        return $this;
    }

    public function removeUserOrganisation(UserOrganisation $userOrganisation): self
    {
        if ($this->userOrganisations->removeElement($userOrganisation)) {
            // set the owning side to null (unless already changed)
            if ($userOrganisation->getPermissionGroup() === $this) {
                $userOrganisation->setPermissionGroup(null);
            }
        }

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

    /**
     * @return Collection|UserEmployee[]
     */
    public function getUserEmployees(): Collection
    {
        return $this->userEmployees;
    }

    public function addUserEmployee(UserEmployee $userEmployee): self
    {
        if (!$this->userEmployees->contains($userEmployee)) {
            $this->userEmployees[] = $userEmployee;
            $userEmployee->setPermissionGroup($this);
        }

        return $this;
    }

    public function removeUserEmployee(UserEmployee $userEmployee): self
    {
        if ($this->userEmployees->removeElement($userEmployee)) {
            // set the owning side to null (unless already changed)
            if ($userEmployee->getPermissionGroup() === $this) {
                $userEmployee->setPermissionGroup(null);
            }
        }

        return $this;
    }
}
