<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\OrganisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisationRepository::class)
 */
class Organisation
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $custom_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $accounting_email;

    /**
     * @ORM\OneToMany(targetEntity=UserOrganisation::class, mappedBy="organisation")
     */
    private $userOrganisations;

    /**
     * @ORM\OneToMany(targetEntity=PermissionGroup::class, mappedBy="organisation")
     */
    private $permissionGroups;

    /**
     * @ORM\ManyToMany(targetEntity=Address::class, inversedBy="organisations")
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity=OrganisationParameter::class, inversedBy="organisation", cascade={"persist", "remove"})
     */
    private $organisationParameter;

    /**
     * @ORM\OneToOne(targetEntity=Token::class, inversedBy="organisation", cascade={"persist", "remove"})
     */
    private $oidToken;

    /**
     * @ORM\OneToOne(targetEntity=Token::class, inversedBy="organisation", cascade={"persist", "remove"})
     */
    private $apiToken;

    public function __construct()
    {
        $this->userOrganisations = new ArrayCollection();
        $this->permissionGroups = new ArrayCollection();
        $this->address = new ArrayCollection();
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

    public function getCustomName(): ?string
    {
        return $this->custom_name;
    }

    public function setCustomName(?string $custom_name): self
    {
        $this->custom_name = $custom_name;

        return $this;
    }

    public function getAccountingEmail(): ?string
    {
        return $this->accounting_email;
    }

    public function setAccountingEmail(string $accounting_email): self
    {
        $this->accounting_email = $accounting_email;

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
            $userOrganisation->setOrganisation($this);
        }

        return $this;
    }

    public function removeUserOrganisation(UserOrganisation $userOrganisation): self
    {
        if ($this->userOrganisations->removeElement($userOrganisation)) {
            // set the owning side to null (unless already changed)
            if ($userOrganisation->getOrganisation() === $this) {
                $userOrganisation->setOrganisation(null);
            }
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
            $permissionGroup->setOrganisation($this);
        }

        return $this;
    }

    public function removePermissionGroup(PermissionGroup $permissionGroup): self
    {
        if ($this->permissionGroups->removeElement($permissionGroup)) {
            // set the owning side to null (unless already changed)
            if ($permissionGroup->getOrganisation() === $this) {
                $permissionGroup->setOrganisation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddress(): Collection
    {
        return $this->address;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->address->contains($address)) {
            $this->address[] = $address;
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        $this->address->removeElement($address);

        return $this;
    }

    public function getOrganisationParameter(): ?OrganisationParameter
    {
        return $this->organisationParameter;
    }

    public function setOrganisationParameter(?OrganisationParameter $organisationParameter): self
    {
        $this->organisationParameter = $organisationParameter;

        return $this;
    }

    public function getOidToken(): ?Token
    {
        return $this->oidToken;
    }

    public function setOidToken(?Token $oidToken): self
    {
        $this->oidToken = $oidToken;

        return $this;
    }

    public function getApiToken(): ?Token
    {
        return $this->apiToken;
    }

    public function setApiToken(?Token $apiToken): self
    {
        $this->apiToken = $apiToken;

        return $this;
    }
}
