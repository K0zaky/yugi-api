<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("usuario")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nick", type="string", length=255, nullable=true)
     * @Groups("usuario")
     */
    private $nick;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo", type="string", length=255, nullable=true)
     * @Groups("usuario")
     */
    private $correo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contrasenya", type="string", length=255, nullable=true)
     * @Groups("usuario")
     */
    private $contrasenya;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * @Groups("usuario")
     */
    private $imagen;



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
     * Get the value of nick
     */
    public function getNick(): ?string
    {
        return $this->nick;
    }

    /**
     * Set the value of nick
     */
    public function setNick(?string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     */
    public function setCorreo(?string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of contrasenya
     */
    public function getContrasenya(): ?string
    {
        return $this->contrasenya;
    }

    /**
     * Set the value of contrasenya
     */
    public function setContrasenya(?string $contrasenya): self
    {
        $this->contrasenya = $contrasenya;

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
}
