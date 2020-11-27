<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\UserOrganisationInfoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserOrganisationInfoRepository::class)
 */
class UserOrganisationInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Phone::class, mappedBy="userOrganisationInfo")
     */
    private $phones;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobTitle;

    /**
     * @ORM\OneToOne(targetEntity=UserOrganisation::class, mappedBy="userOrganisationInfo", cascade={"persist", "remove"})
     */
    private $userOrganisation;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Phone[]
     */
    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone): self
    {
        if (!$this->phones->contains($phone)) {
            $this->phones[] = $phone;
            $phone->setUserOrganisationInfo($this);
        }

        return $this;
    }

    public function removePhone(Phone $phone): self
    {
        if ($this->phones->removeElement($phone)) {
            // set the owning side to null (unless already changed)
            if ($phone->getUserOrganisationInfo() === $this) {
                $phone->setUserOrganisationInfo(null);
            }
        }

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getUserOrganisation(): ?UserOrganisation
    {
        return $this->userOrganisation;
    }

    public function setUserOrganisation(?UserOrganisation $userOrganisation): self
    {
        $this->userOrganisation = $userOrganisation;

        // set (or unset) the owning side of the relation if necessary
        $newUserOrganisationInfo = null === $userOrganisation ? null : $this;
        if ($userOrganisation->getUserOrganisationInfo() !== $newUserOrganisationInfo) {
            $userOrganisation->setUserOrganisationInfo($newUserOrganisationInfo);
        }

        return $this;
    }
}
