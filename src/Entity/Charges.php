<?php

namespace App\Entity;

use App\Repository\ChargesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChargesRepository::class)]
class Charges
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $loyer_mensuel = null;

    #[ORM\Column]
    private ?int $garantie_loyer = null;

    #[ORM\Column]
    private ?float $provision_charge = null;

    #[ORM\Column]
    private ?float $etat_des_lieux = null;

    #[ORM\OneToOne(inversedBy: 'charges', cascade: ['persist', 'remove'])]
    private ?Appartement $appartement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoyerMensuel(): ?int
    {
        return $this->loyer_mensuel;
    }

    public function setLoyerMensuel(int $loyer_mensuel): self
    {
        $this->loyer_mensuel = $loyer_mensuel;

        return $this;
    }

    public function getGarantieLoyer(): ?int
    {
        return $this->garantie_loyer;
    }

    public function setGarantieLoyer(int $garantie_loyer): self
    {
        $this->garantie_loyer = $garantie_loyer;

        return $this;
    }

    public function getProvisionCharge(): ?float
    {
        return $this->provision_charge;
    }

    public function setProvisionCharge(float $provision_charge): self
    {
        $this->provision_charge = $provision_charge;

        return $this;
    }

    public function getEtatDesLieux(): ?float
    {
        return $this->etat_des_lieux;
    }

    public function setEtatDesLieux(float $etat_des_lieux): self
    {
        $this->etat_des_lieux = $etat_des_lieux;

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
