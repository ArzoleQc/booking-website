<?php

namespace CoreBundle\Entity;

use CoreBundle\Repository\OrganisationParameterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisationParameterRepository::class)
 */
class OrganisationParameter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Organisation::class, mappedBy="organisationParameter", cascade={"persist", "remove"})
     */
    private $organisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organisation $organisation): self
    {
        $this->organisation = $organisation;

        // set (or unset) the owning side of the relation if necessary
        $newOrganisationParameter = null === $organisation ? null : $this;
        if ($organisation->getOrganisationParameter() !== $newOrganisationParameter) {
            $organisation->setOrganisationParameter($newOrganisationParameter);
        }

        return $this;
    }
}
