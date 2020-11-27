<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhoneRepository::class)
 */
class Phone
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
    private $phone_number;

    /**
     * @ORM\ManyToOne(targetEntity=UserInfo::class, inversedBy="phones")
     */
    private $userInfo;

    /**
     * @ORM\ManyToOne(targetEntity=UserOrganisationInfo::class, inversedBy="phones")
     */
    private $userOrganisationInfo;

    /**
     * @ORM\ManyToOne(targetEntity=PhoneType::class, inversedBy="phones")
     */
    private $phoneType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

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

    public function getUserOrganisationInfo(): ?UserOrganisationInfo
    {
        return $this->userOrganisationInfo;
    }

    public function setUserOrganisationInfo(?UserOrganisationInfo $userOrganisationInfo): self
    {
        $this->userOrganisationInfo = $userOrganisationInfo;

        return $this;
    }

    public function getPhoneType(): ?PhoneType
    {
        return $this->phoneType;
    }

    public function setPhoneType(?PhoneType $phoneType): self
    {
        $this->phoneType = $phoneType;

        return $this;
    }
}
