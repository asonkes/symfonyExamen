<?php

/**
 * Detail de la base de données 'voiture'.
 */

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $km = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $nbproprio = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $cylindree = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $puissance = null;

    #[ORM\Column(length: 255)]
    private ?string $carburant = null;

    #[ORM\Column(length: 255)]
    private ?string $transmission = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $texte = null;

    #[ORM\Column]
    private ?int $circ = null;

    #[ORM\OneToMany(mappedBy: 'voiture_id', targetEntity: Image::class)]
    private Collection $myImages;

    public function __construct()
    {
        $this->myImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbproprio(): ?int
    {
        return $this->nbproprio;
    }

    public function setNbproprio(int $nbproprio): static
    {
        $this->nbproprio = $nbproprio;

        return $this;
    }

    public function getCylindree(): ?int
    {
        return $this->cylindree;
    }

    public function setCylindree(int $cylindree): static
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): static
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): static
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): static
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getCirc(): ?int
    {
        return $this->circ;
    }

    public function setCirc(int $Circ): static
    {
        $this->circ = $Circ;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getMyImages(): Collection
    {
        return $this->myImages;
    }

    public function addMyImage(Image $myImage): static
    {
        if (!$this->myImages->contains($myImage)) {
            $this->myImages->add($myImage);
            $myImage->setVoitureId($this);
        }

        return $this;
    }

    public function removeMyImage(Image $myImage): static
    {
        if ($this->myImages->removeElement($myImage)) {
            // set the owning side to null (unless already changed)
            if ($myImage->getVoitureId() === $this) {
                $myImage->setVoitureId(null);
            }
        }

        return $this;
    }
}
