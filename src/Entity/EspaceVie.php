<?php

namespace App\Entity;

use App\Repository\EspaceVieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspaceVieRepository::class)]
class EspaceVie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $parking = null;

    #[ORM\Column]
    private ?bool $sde = null;

    #[ORM\Column]
    private ?bool $sdb = null;

    #[ORM\Column]
    private ?bool $ascenseur = null;

    #[ORM\Column]
    private ?bool $coloc = null;

    #[ORM\ManyToOne(inversedBy: 'espaceVie')]
    private ?Appartement $appartement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(bool $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function isSde(): ?bool
    {
        return $this->sde;
    }

    public function setSde(bool $sde): self
    {
        $this->sde = $sde;

        return $this;
    }

    public function isSdb(): ?bool
    {
        return $this->sdb;
    }

    public function setSdb(bool $sdb): self
    {
        $this->sdb = $sdb;

        return $this;
    }

    public function isAscenseur(): ?bool
    {
        return $this->ascenseur;
    }

    public function setAscenseur(bool $ascenseur): self
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    public function isColoc(): ?bool
    {
        return $this->coloc;
    }

    public function setColoc(bool $coloc): self
    {
        $this->coloc = $coloc;

        return $this;
    }

    public function getAppartement(): ?Appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartement $appartement): self
    {
        $this->appartement = $appartement;

        return $this;
    }
}
