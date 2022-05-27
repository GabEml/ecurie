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
    private $id_date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity=Horse::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_horse;

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

    public function getIdDate(): ?PlanningHealthy
    {
        return $this->id_date;
    }

    public function setIdDate(?PlanningHealthy $id_date): self
    {
        $this->id_date = $id_date;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdHorse(): ?Horse
    {
        return $this->id_horse;
    }

    public function setIdHorse(?Horse $id_horse): self
    {
        $this->id_horse = $id_horse;

        return $this;
    }
}
