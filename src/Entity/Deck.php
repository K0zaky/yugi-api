<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Deck
 *
 * @ORM\Table(name="deck", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Deck
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("deck")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups("deck")
     */
    private $nombre;

    /**
     * @var float|null
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=true)
     * @Groups("deck")
     */
    private $precio;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Carta", mappedBy="idDeck")
     * @Groups("deck")
     */
    private $idCarta = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCarta = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio(?float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): Usuario
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser(Usuario $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of idCarta
     */
    public function getIdCarta(): \Doctrine\Common\Collections\Collection
    {
        return $this->idCarta;
    }

    /**
     * Set the value of idCarta
     */
    public function setIdCarta(\Doctrine\Common\Collections\Collection $idCarta): self
    {
        $this->idCarta = $idCarta;

        return $this;
    }
}
