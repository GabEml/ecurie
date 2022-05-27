<?php

namespace App\Entity;

use App\Repository\PlanningBoxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanningBoxRepository::class)
 */
class PlanningBox
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\ManyToOne(targetEntity=Box::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_box;

    /**
     * @ORM\ManyToOne(targetEntity=Horse::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_horse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getIdBox(): ?Box
    {
        return $this->id_box;
    }

    public function setIdBox(?Box $id_box): self
    {
        $this->id_box = $id_box;

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
