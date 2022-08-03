<?php

namespace App\Entity;

use App\Repository\AmendementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AmendementRepository::class)]
class Amendement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $term;

    #[ORM\Column(type: 'date')]
    private $dateEffect;

    #[ORM\Column(type: 'date')]
    private $dateEnding;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'text')]
    private $newProvisions;

    #[ORM\ManyToOne(targetEntity: Contract::class)]
    private $contract;

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

    public function getTerm(): ?int
    {
        return $this->term;
    }

    public function setTerm(int $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getDateEffect(): ?\DateTimeInterface
    {
        return $this->dateEffect;
    }

    public function setDateEffect(\DateTimeInterface $dateEffect): self
    {
        $this->dateEffect = $dateEffect;

        return $this;
    }

    public function getDateEnding(): ?\DateTimeInterface
    {
        return $this->dateEnding;
    }

    public function setDateEnding(\DateTimeInterface $dateEnding): self
    {
        $this->dateEnding = $dateEnding;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getNewProvisions(): ?string
    {
        return $this->newProvisions;
    }

    public function setNewProvisions(string $newProvisions): self
    {
        $this->newProvisions = $newProvisions;

        return $this;
    }

    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    public function setContract(?Contract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }
}
