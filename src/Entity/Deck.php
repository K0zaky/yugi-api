<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="deck", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Deck
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @Groups("deck")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups("deck")
     */
    private $nombre;

    /**
     * @ORM\Column(name="precio", type="float", nullable=true)
     * @Groups("deck")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $idUser;

    /**
     * @ORM\ManyToMany(targetEntity="Carta", inversedBy="idDeck")
     * @ORM\JoinTable(name="carta_deck",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_deck", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_carta", referencedColumnName="id")
     *   }
     * )
     */
    private $idCarta;

    public function __construct()
    {
        $this->idCarta = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(?float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getIdUser(): ?Usuario
    {
        return $this->idUser;
    }

    public function setIdUser(?Usuario $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdCarta(): ?\Doctrine\Common\Collections\Collection
    {
        return $this->idCarta;
    }

    public function setIdCarta(?\Doctrine\Common\Collections\Collection $idCarta): self
    {
        $this->idCarta = $idCarta;

        return $this;
    }

    public function addIdCarta(Carta $carta): self
    {
        if (!$this->idCarta->contains($carta)) {
            $this->idCarta[] = $carta;
            $carta->addIdDeck($this);
        }

        return $this;
    }

    public function removeIdCarta(Carta $carta): self
    {
        if ($this->idCarta->contains($carta)) {
            $this->idCarta->removeElement($carta);
            $carta->removeIdDeck($this);
        }

        return $this;
    }
}