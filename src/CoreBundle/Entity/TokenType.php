<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\TokenTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TokenTypeRepository::class)
 */
class TokenType
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
     * @ORM\Column(type="dateinterval", nullable=true)
     */
    private $validity_period;

    /**
     * @ORM\OneToMany(targetEntity=Token::class, mappedBy="tokenType")
     */
    private $tokens;

    public function __construct()
    {
        $this->tokens = new ArrayCollection();
    }

    public static function create(): TokenType {
        return new TokenType();
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

    public function getValidityPeriod(): ?\DateInterval
    {
        return $this->validity_period;
    }

    public function setValidityPeriod(?\DateInterval $validity_period): self
    {
        $this->validity_period = $validity_period;

        return $this;
    }

    /**
     * @return Collection|Token[]
     */
    public function getTokens(): Collection
    {
        return $this->tokens;
    }

    public function addToken(Token $token): self
    {
        if (!$this->tokens->contains($token)) {
            $this->tokens[] = $token;
            $token->setTokenType($this);
        }

        return $this;
    }

    public function removeToken(Token $token): self
    {
        if ($this->tokens->removeElement($token)) {
            // set the owning side to null (unless already changed)
            if ($token->getTokenType() === $this) {
                $token->setTokenType(null);
            }
        }

        return $this;
    }
}
