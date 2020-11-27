<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deleted_at;

    /**
     * @ORM\OneToOne(targetEntity=UserInfo::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $userInfo;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, inversedBy="users")
     */
    private $roles;

    /**
     * @ORM\OneToOne(targetEntity=UserParameter::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $userParameter;

    /**
     * @ORM\OneToOne(targetEntity=UserEmployee::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $userEmployee;

    /**
     * @ORM\OneToMany(targetEntity=UserOrganisation::class, mappedBy="user")
     */
    private $userOrganisations;

    /**
     * @ORM\OneToMany(targetEntity=Credential::class, mappedBy="user")
     */
    private $credentials;

    /**
     * @ORM\OneToOne(targetEntity=Token::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $uidToken;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->userOrganisations = new ArrayCollection();
        $this->credentials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(\DateTimeInterface $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getUserInfo(): ?UserInfo
    {
        return $this->userInfo;
    }

    public function setUserInfo(?UserInfo $userInfo): self
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        $this->roles->removeElement($role);

        return $this;
    }

    public function getUserParameter(): ?UserParameter
    {
        return $this->userParameter;
    }

    public function setUserParameter(?UserParameter $userParameter): self
    {
        $this->userParameter = $userParameter;

        return $this;
    }

    public function getUserEmployee(): ?UserEmployee
    {
        return $this->userEmployee;
    }

    public function setUserEmployee(?UserEmployee $userEmployee): self
    {
        $this->userEmployee = $userEmployee;

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
            $userOrganisation->setUser($this);
        }

        return $this;
    }

    public function removeUserOrganisation(UserOrganisation $userOrganisation): self
    {
        if ($this->userOrganisations->removeElement($userOrganisation)) {
            // set the owning side to null (unless already changed)
            if ($userOrganisation->getUser() === $this) {
                $userOrganisation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Credential[]
     */
    public function getCredentials(): Collection
    {
        return $this->credentials;
    }

    public function addCredential(Credential $credential): self
    {
        if (!$this->credentials->contains($credential)) {
            $this->credentials[] = $credential;
            $credential->setUser($this);
        }

        return $this;
    }

    public function removeCredential(Credential $credential): self
    {
        if ($this->credentials->removeElement($credential)) {
            // set the owning side to null (unless already changed)
            if ($credential->getUser() === $this) {
                $credential->setUser(null);
            }
        }

        return $this;
    }

    public function getUidToken(): ?Token
    {
        return $this->uidToken;
    }

    public function setUidToken(?Token $uidToken): self
    {
        $this->uidToken = $uidToken;

        return $this;
    }
}
