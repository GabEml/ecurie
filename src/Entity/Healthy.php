<?php

namespace App\Entity;

use App\Repository\HealthyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HealthyRepository::class)
 */
class Healthy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bilan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $patologie;

    /**
     * @ORM\ManyToOne(targetEntity=PlanningHealthy::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Horse::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $horse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(?string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }

    public function getPatologie(): ?string
    {
        return $this->patologie;
    }

    public function setPatologie(?string $patologie): self
    {
        $this->patologie = $patologie;

        return $this;
    }

    public function getDate(): ?PlanningHealthy
    {
        return $this->date;
    }

    public function setDate(?PlanningHealthy $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getHorse(): ?Horse
    {
        return $this->horse;
    }

    public function setHorse(?Horse $horse): self
    {
        $this->horse = $horse;

        return $this;
    }
}
