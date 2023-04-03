<?php

namespace App\Entity;

use App\Repository\SurfacePieceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SurfacePieceRepository::class)]
class SurfacePiece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $m2_par_piece = null;

    #[ORM\ManyToOne(inversedBy: 'surfacePieces')]
    private ?Appartement $appartement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getM2ParPiece(): ?int
    {
        return $this->m2_par_piece;
    }

    public function setM2ParPiece(int $m2_par_piece): self
    {
        $this->m2_par_piece = $m2_par_piece;

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
