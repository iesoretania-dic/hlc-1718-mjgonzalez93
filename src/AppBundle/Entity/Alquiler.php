<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlquilerRepository")
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
     * @ORM\Column(type="integer")
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 10,
     *      minMessage = "Como mínimo se tiene que alquilar para {{ limit }} día",
     *      maxMessage = "Como máximo se puede alquilar {{ limit }} días"
     * )
     *
     * @var integer
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
    private $rechazado;

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

    public function __toString()
    {
        return $this->getId().' - '.$this->getVehiculo();
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
     * Set rechazado
     *
     * @param boolean $rechazado
     *
     * @return Alquiler
     */
    public function setRechazado($rechazado)
    {
        $this->rechazado = $rechazado;

        return $this;
    }

    /**
     * Get rechazado
     *
     * @return boolean
     */
    public function getRechazado()
    {
        return $this->rechazado;
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
