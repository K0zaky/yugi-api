<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Magica
 *
 * @ORM\Table(name="magica")
 * @ORM\Entity
 */
class Magica
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups("magica")
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_magia", type="string", length=255, nullable=true)
     * @Groups("magica")
     */
    private $tipoMagia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="efecto", type="string", length=10000, nullable=true)
     * @Groups("magica")
     */
    private $efecto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * @Groups("magica")
     */
    private $imagen;

    /**
     * @var Carta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Carta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



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
     * Get the value of tipoMagia
     */
    public function getTipoMagia(): ?string
    {
        return $this->tipoMagia;
    }

    /**
     * Set the value of tipoMagia
     */
    public function setTipoMagia(?string $tipoMagia): self
    {
        $this->tipoMagia = $tipoMagia;

        return $this;
    }

    /**
     * Get the value of efecto
     */
    public function getEfecto(): ?string
    {
        return $this->efecto;
    }

    /**
     * Set the value of efecto
     */
    public function setEfecto(?string $efecto): self
    {
        $this->efecto = $efecto;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): Carta
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(Carta $id): self
    {
        $this->id = $id;

        return $this;
    }
}
