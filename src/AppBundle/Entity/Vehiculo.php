<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="vehiculo")
 */
class Vehiculo
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
     * @ORM\Column(type="string", length=7, unique=true)
     *
     * @var string
     */
    private $matricula;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $marca;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $modelo;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $categoria;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $cilindrada;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $combustible;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $direccionAlmacenado;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    private $precioDia;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $enAlquiler;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $enReparacion;



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
     * Set matricula
     *
     * @param string $matricula
     *
     * @return Vehiculo
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Vehiculo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Vehiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Vehiculo
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set cilindrada
     *
     * @param integer $cilindrada
     *
     * @return Vehiculo
     */
    public function setCilindrada($cilindrada)
    {
        $this->cilindrada = $cilindrada;

        return $this;
    }

    /**
     * Get cilindrada
     *
     * @return integer
     */
    public function getCilindrada()
    {
        return $this->cilindrada;
    }

    /**
     * Set combustible
     *
     * @param string $combustible
     *
     * @return Vehiculo
     */
    public function setCombustible($combustible)
    {
        $this->combustible = $combustible;

        return $this;
    }

    /**
     * Get combustible
     *
     * @return string
     */
    public function getCombustible()
    {
        return $this->combustible;
    }

    /**
     * Set direccionAlmacenado
     *
     * @param string $direccionAlmacenado
     *
     * @return Vehiculo
     */
    public function setDireccionAlmacenado($direccionAlmacenado)
    {
        $this->direccionAlmacenado = $direccionAlmacenado;

        return $this;
    }

    /**
     * Get direccionAlmacenado
     *
     * @return string
     */
    public function getDireccionAlmacenado()
    {
        return $this->direccionAlmacenado;
    }

    /**
     * Set precioDia
     *
     * @param float $precioDia
     *
     * @return Vehiculo
     */
    public function setPrecioDia($precioDia)
    {
        $this->precioDia = $precioDia;

        return $this;
    }

    /**
     * Get precioDia
     *
     * @return float
     */
    public function getPrecioDia()
    {
        return $this->precioDia;
    }

    /**
     * Set enAlquiler
     *
     * @param boolean $enAlquiler
     *
     * @return Vehiculo
     */
    public function setEnAlquiler($enAlquiler)
    {
        $this->enAlquiler = $enAlquiler;

        return $this;
    }

    /**
     * Get enAlquiler
     *
     * @return boolean
     */
    public function getEnAlquiler()
    {
        return $this->enAlquiler;
    }

    /**
     * Set enReparacion
     *
     * @param boolean $enReparacion
     *
     * @return Vehiculo
     */
    public function setEnReparacion($enReparacion)
    {
        $this->enReparacion = $enReparacion;

        return $this;
    }

    /**
     * Get enReparacion
     *
     * @return boolean
     */
    public function getEnReparacion()
    {
        return $this->enReparacion;
    }
}
