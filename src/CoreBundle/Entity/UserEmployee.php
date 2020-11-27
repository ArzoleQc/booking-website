<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\UserEmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserEmployeeRepository::class)
 */
class UserEmployee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="userEmployee", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=PermissionGroup::class, inversedBy="userEmployees")
     */
    private $permissionGroup;

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

        // set (or unset) the owning side of the relation if necessary
        $newUserEmployee = null === $user ? null : $this;
        if ($user->getUserEmployee() !== $newUserEmployee) {
            $user->setUserEmployee($newUserEmployee);
        }

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
}
