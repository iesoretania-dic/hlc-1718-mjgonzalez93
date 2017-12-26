<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @ORM\Table(name="usuario")
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9, unique=true)
     *
     * @var string
     */
    private $dni;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $direccion;
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    private $saldo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $administrador;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $comercial;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $mecanico;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $cliente;

    /**
     *
     */
    public function __toString()
    {
        return $this->getNombre() . ', ' . $this->getApellidos();
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facturaReparacion = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Usuario
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     *
     * @return Usuario
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return float
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set administrador
     *
     * @param boolean $administrador
     *
     * @return Usuario
     */
    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;

        return $this;
    }

    /**
     * Get administrador
     *
     * @return boolean
     */
    public function getAdministrador()
    {
        return $this->administrador;
    }

    /**
     * Set comercial
     *
     * @param boolean $comercial
     *
     * @return Usuario
     */
    public function setComercial($comercial)
    {
        $this->comercial = $comercial;

        return $this;
    }

    /**
     * Get comercial
     *
     * @return boolean
     */
    public function getComercial()
    {
        return $this->comercial;
    }

    /**
     * Set mecanico
     *
     * @param boolean $mecanico
     *
     * @return Usuario
     */
    public function setMecanico($mecanico)
    {
        $this->mecanico = $mecanico;

        return $this;
    }

    /**
     * Get mecanico
     *
     * @return boolean
     */
    public function getMecanico()
    {
        return $this->mecanico;
    }

    /**
     * Set cliente
     *
     * @param boolean $cliente
     *
     * @return Usuario
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return boolean
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}
