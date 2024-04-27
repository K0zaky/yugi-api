<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trampa
 *
 * @ORM\Table(name="trampa")
 * @ORM\Entity
 */
class Trampa
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups("trampa")
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_trampa", type="string", length=255, nullable=true)
     * @Groups("trampa")
     */
    private $tipoTrampa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="efecto", type="string", length=10000, nullable=true)
     * @Groups("trampa")
     */
    private $efecto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * @Groups("trampa")
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
     * Get the value of tipoTrampa
     */
    public function getTipoTrampa(): ?string
    {
        return $this->tipoTrampa;
    }

    /**
     * Set the value of tipoTrampa
     */
    public function setTipoTrampa(?string $tipoTrampa): self
    {
        $this->tipoTrampa = $tipoTrampa;

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
