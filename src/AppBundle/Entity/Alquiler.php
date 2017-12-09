<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="alquiler")
 */
class Alquiler
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
    private $dias;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    private $precioTotal;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $alquilado;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $devuelto;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $paraReparar;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vehiculo")
     * @var Vehiculo
     */
    private $vehiculo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @var Usuario
     */
    private $usuario;

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
     * Set dias
     *
     * @param string $dias
     *
     * @return Alquiler
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    /**
     * Get dias
     *
     * @return string
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set precioTotal
     *
     * @param float $precioTotal
     *
     * @return Alquiler
     */
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;

        return $this;
    }

    /**
     * Get precioTotal
     *
     * @return float
     */
    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    /**
     * Set alquilado
     *
     * @param boolean $alquilado
     *
     * @return Alquiler
     */
    public function setAlquilado($alquilado)
    {
        $this->alquilado = $alquilado;

        return $this;
    }

    /**
     * Get alquilado
     *
     * @return boolean
     */
    public function getAlquilado()
    {
        return $this->alquilado;
    }

    /**
     * Set devuelto
     *
     * @param boolean $devuelto
     *
     * @return Alquiler
     */
    public function setDevuelto($devuelto)
    {
        $this->devuelto = $devuelto;

        return $this;
    }

    /**
     * Get devuelto
     *
     * @return boolean
     */
    public function getDevuelto()
    {
        return $this->devuelto;
    }

    /**
     * Set paraReparar
     *
     * @param boolean $paraReparar
     *
     * @return Alquiler
     */
    public function setParaReparar($paraReparar)
    {
        $this->paraReparar = $paraReparar;

        return $this;
    }

    /**
     * Get paraReparar
     *
     * @return boolean
     */
    public function getParaReparar()
    {
        return $this->paraReparar;
    }

    /**
     * Set vehiculo
     *
     * @param \AppBundle\Entity\Vehiculo $vehiculo
     *
     * @return Alquiler
     */
    public function setVehiculo(\AppBundle\Entity\Vehiculo $vehiculo = null)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return \AppBundle\Entity\Vehiculo
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Alquiler
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
