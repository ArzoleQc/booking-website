<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\TokenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TokenRepository::class)
 */
class Token
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
    private $token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="uidToken", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Organisation::class, mappedBy="oidToken", cascade={"persist", "remove"})
     */
    private $organisation;

    /**
     * @ORM\ManyToOne(targetEntity=TokenType::class, inversedBy="tokens")
     */
    private $tokenType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newUidToken = null === $user ? null : $this;
        if ($user->getUidToken() !== $newUidToken) {
            $user->setUidToken($newUidToken);
        }

        return $this;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organisation $organisation): self
    {
        $this->organisation = $organisation;

        // set (or unset) the owning side of the relation if necessary
        $newOidToken = null === $organisation ? null : $this;
        if ($organisation->getOidToken() !== $newOidToken) {
            $organisation->setOidToken($newOidToken);
        }

        return $this;
    }

    public function getTokenType(): ?TokenType
    {
        return $this->tokenType;
    }

    public function setTokenType(?TokenType $tokenType): self
    {
        $this->tokenType = $tokenType;

        return $this;
    }
}
