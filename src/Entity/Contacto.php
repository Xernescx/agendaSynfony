<?php

namespace App\Entity;

use App\Repository\ContactoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;//Hace que no podamos tener duplicados lo que necesitemos en mi caso Correo y telefono
/**
 *  @UniqueEntity(
 *      fields={"correo"},
 *     errorPath="correo",
 *     message="El correo esta en uso."
 * )
 * @UniqueEntity(
 *      fields={"telefono"},
 *     errorPath="telefono",
 *     message="El telefono esta en uso."
 * ) 
 *  @ORM\Entity(repositoryClass=ContactoRepository::class)
 */
class Contacto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *  @Assert\NotBlank
     * @ORM\Column(type="string", length=40)
     */
    private $nombre;
    //NotBlank para que sea un campo obligatorio
    /**
     * @Assert\NotBlank
     * 
     * @ORM\Column(type="string", length=50)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\NotBlank
     * @Assert\Regex("/^\+?\d+/")
     */
    //NotBlank para que sea un campo obligatorio
    //Uso assert regex para solo aceptar numeros de telefono validos
    private $telefono;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=120)
     */
    private $correo;
    //NotBlank para que sea un campo obligatorio
    /**
     * @Assert\NotBlank
     *  
     * @ORM\Column(type="string", length=10)
     */
    private $tipo;
    //NotBlank para que sea un campo obligatorio
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getNotas(): ?string
    {
        return $this->notas;
    }

    public function setNotas(?string $notas): self
    {
        $this->notas = $notas;

        return $this;
    }
}
