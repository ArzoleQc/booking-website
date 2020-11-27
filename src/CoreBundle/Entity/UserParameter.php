<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\UserParameterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserParameterRepository::class)
 */
class UserParameter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="userParameter", cascade={"persist", "remove"})
     */
    private $user;

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
        $newUserParameter = null === $user ? null : $this;
        if ($user->getUserParameter() !== $newUserParameter) {
            $user->setUserParameter($newUserParameter);
        }

        return $this;
    }
}
