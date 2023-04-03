<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_url = null;

    #[ORM\ManyToOne(inversedBy: 'pictures')]
    private ?Appartement $appartement_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLienUrl(): ?string
    {
        return $this->lien_url;
    }

    public function setLienUrl(string $lien_url): self
    {
        $this->lien_url = $lien_url;

        return $this;
    }

    public function getAppartementId(): ?Appartement
    {
        return $this->appartement_id;
    }

    public function setAppartementId(?Appartement $appartement_id): self
    {
        $this->appartement_id = $appartement_id;

        return $this;
    }
}
