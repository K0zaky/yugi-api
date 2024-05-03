<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="carta")
 * @ORM\Entity
 */
class Carta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @Groups("carta")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups("carta")
     */
    private $nombre;

    /**
     * @ORM\Column(name="codigo", type="string", length=255, nullable=true)
     * @Groups("carta")
     */
    private $codigo;

    /**
     * @ORM\Column(name="precio", type="float", nullable=true)
     * @Groups("carta")
     */
    private $precio;

    /**
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * @Groups("carta")
     */
    private $imagen;

    /**
     * @ORM\ManyToMany(targetEntity="Deck", mappedBy="idCarta")
     */
    private $idDeck;

    public function __construct()
    {
        $this->idDeck = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(?float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getIdDeck(): ?\Doctrine\Common\Collections\Collection
    {
        return $this->idDeck;
    }

    public function setIdDeck(?\Doctrine\Common\Collections\Collection $idDeck): self
    {
        $this->idDeck = $idDeck;

        return $this;
    }

    public function addIdDeck(Deck $deck): self
    {
        if (!$this->idDeck->contains($deck)) {
            $this->idDeck[] = $deck;
            $deck->addIdCarta($this);
        }

        return $this;
    }

    public function removeIdDeck(Deck $deck): self
    {
        if ($this->idDeck->contains($deck)) {
            $this->idDeck->removeElement($deck);
            $deck->removeIdCarta($this);
        }

        return $this;
    }
}