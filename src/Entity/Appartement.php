<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $ref_bien = null;

    #[ORM\Column]
    private ?int $nbre_pieces = null;

    #[ORM\Column]
    private ?int $surface_total = null;

    #[ORM\OneToMany(mappedBy: 'appartement_id', targetEntity: Picture::class)]
    private Collection $pictures;

    #[ORM\OneToOne(mappedBy: 'appartement', cascade: ['persist', 'remove'])]
    private ?Charges $charges = null;

    #[ORM\OneToMany(mappedBy: 'appartement', targetEntity: SurfacePiece::class)]
    private Collection $surfacePieces;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    private ?Agence $ref_agence = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    private ?ClasseEnergetique $classe_energie = null;

    #[ORM\OneToMany(mappedBy: 'appartement', targetEntity: EspaceVie::class)]
    private Collection $espaceVie;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->surfacePieces = new ArrayCollection();
        $this->espaceVie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getRefBien(): ?string
    {
        return $this->ref_bien;
    }

    public function setRefBien(string $ref_bien): self
    {
        $this->ref_bien = $ref_bien;

        return $this;
    }

    public function getNbrePieces(): ?int
    {
        return $this->nbre_pieces;
    }

    public function setNbrePieces(int $nbre_pieces): self
    {
        $this->nbre_pieces = $nbre_pieces;

        return $this;
    }

    public function getSurfaceTotal(): ?int
    {
        return $this->surface_total;
    }

    public function setSurfaceTotal(int $surface_total): self
    {
        $this->surface_total = $surface_total;

        return $this;
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures->add($picture);
            $picture->setAppartementId($this);
        }

        // if (!$this->appartement->contains($apparts)) {
        //     $this->appartement[] = $apparts;
        //     $apparts->setPictures($this);
        // }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getAppartementId() === $this) {
                $picture->setAppartementId(null);
            }
        }

        return $this;
    }

    public function getCharges(): ?Charges
    {
        return $this->charges;
    }

    public function setCharges(?Charges $charges): self
    {
        // unset the owning side of the relation if necessary
        // if ($charges === null && $this->charges !== null) {
        //     $this->charges->setAppartement(null);


        // }

        if (!$this->appartement->contains($apparts)) {
            $this->appartement[] = $apparts;
            $apparts->setCharges($this);
        }

        // set the owning side of the relation if necessary
        // if ($charges !== null && $charges->getAppartement() !== $this) {
        //     $charges->setAppartement($this);
        // }

        $this->charges = $charges;

        return $this;
    }

    /**
     * @return Collection<int, SurfacePiece>
     */
    public function getSurfacePieces(): Collection
    {
        return $this->surfacePieces;
    }

    public function addSurfacePiece(SurfacePiece $surfacePiece): self
    {
        if (!$this->surfacePieces->contains($surfacePiece)) {
            $this->surfacePieces->add($surfacePiece);
            $surfacePiece->setAppartement($this);
        }
        // if (!$this->appartement->contains($apparts)) {
        //     $this->appartement[] = $apparts;
        //     $apparts->setSurfacePiece($this);
        // }

        $this->surfacePieces = $surfacePiece;

        return $this;
    }

    public function removeSurfacePiece(SurfacePiece $surfacePiece): self
    {
        if ($this->surfacePieces->removeElement($surfacePiece)) {
            // set the owning side to null (unless already changed)
            if ($surfacePiece->getAppartement() === $this) {
                $surfacePiece->setAppartement(null);
            }
        }

        return $this;
    }

    public function getRefAgence(): ?Agence
    {
        return $this->ref_agence;
    }

    public function setRefAgence(?Agence $ref_agence): self
    {
        $this->ref_agence = $ref_agence;

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

    public function getClasseEnergie(): ?ClasseEnergetique
    {
        return $this->classe_energie;
    }

    public function setClasseEnergie(?ClasseEnergetique $classe_energie): self
    {
        $this->classe_energie = $classe_energie;

        return $this;
    }

    /**
     * @return Collection<int, EspaceVie>
     */
    public function getEspaceVie(): Collection
    {
        return $this->espaceVie;
    }

    public function addEspaceVie(EspaceVie $espaceVie): self
    {
        if (!$this->espaceVie->contains($espaceVie)) {
            $this->espaceVie->add($espaceVie);
            $espaceVie->setAppartement($this);
        }

        return $this;
    }

    public function removeEspaceVie(EspaceVie $espaceVie): self
    {
        if ($this->espaceVie->removeElement($espaceVie)) {
            // set the owning side to null (unless already changed)
            if ($espaceVie->getAppartement() === $this) {
                $espaceVie->setAppartement(null);
            }
        }

        return $this;
    }
}
