<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Monstruo
 *
 * @ORM\Table(name="monstruo")
 * @ORM\Entity
 */
class Monstruo
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups("monstruo")
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     * @Groups("monstruo")
     */
    private $nivel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="atributo", type="string", length=255, nullable=true)
     * @Groups("monstruo")
     */
    private $atributo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invocacion", type="string", length=255, nullable=true)
     * @Groups("monstruo")
     */
    private $invocacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_monstruo", type="string", length=255, nullable=true)
     * @Groups("monstruo")
     */
    private $tipoMonstruo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="efecto", type="string", length=10000, nullable=true)
     * @Groups("monstruo")
     */
    private $efecto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ataque", type="integer", nullable=true)
     * @Groups("monstruo")
     */
    private $ataque;

    /**
     * @var int|null
     *
     * @ORM\Column(name="defensa", type="integer", nullable=true)
     * @Groups("monstruo")
     */
    private $defensa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * @Groups("monstruo")
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
     * Get the value of nivel
     */
    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    /**
     * Set the value of nivel
     */
    public function setNivel(?int $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get the value of atributo
     */
    public function getAtributo(): ?string
    {
        return $this->atributo;
    }

    /**
     * Set the value of atributo
     */
    public function setAtributo(?string $atributo): self
    {
        $this->atributo = $atributo;

        return $this;
    }

    /**
     * Get the value of invocacion
     */
    public function getInvocacion(): ?string
    {
        return $this->invocacion;
    }

    /**
     * Set the value of invocacion
     */
    public function setInvocacion(?string $invocacion): self
    {
        $this->invocacion = $invocacion;

        return $this;
    }

    /**
     * Get the value of tipoMonstruo
     */
    public function getTipoMonstruo(): ?string
    {
        return $this->tipoMonstruo;
    }

    /**
     * Set the value of tipoMonstruo
     */
    public function setTipoMonstruo(?string $tipoMonstruo): self
    {
        $this->tipoMonstruo = $tipoMonstruo;

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
     * Get the value of ataque
     */
    public function getAtaque(): ?int
    {
        return $this->ataque;
    }

    /**
     * Set the value of ataque
     */
    public function setAtaque(?int $ataque): self
    {
        $this->ataque = $ataque;

        return $this;
    }

    /**
     * Get the value of defensa
     */
    public function getDefensa(): ?int
    {
        return $this->defensa;
    }

    /**
     * Set the value of defensa
     */
    public function setDefensa(?int $defensa): self
    {
        $this->defensa = $defensa;

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
