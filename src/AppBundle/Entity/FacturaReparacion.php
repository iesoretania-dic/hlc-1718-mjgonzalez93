<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="facturareparacion")
 */
class FacturaReparacion
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
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @var Usuario
     */
    private $mecanico;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Alquiler")
     * @var Alquiler
     */
    private $alquiler;



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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return FacturaReparacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return FacturaReparacion
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set mecanico
     *
     * @param \AppBundle\Entity\Usuario $mecanico
     *
     * @return FacturaReparacion
     */
    public function setMecanico(\AppBundle\Entity\Usuario $mecanico = null)
    {
        $this->mecanico = $mecanico;

        return $this;
    }

    /**
     * Get mecanico
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getMecanico()
    {
        return $this->mecanico;
    }

    /**
     * Set alquiler
     *
     * @param \AppBundle\Entity\Alquiler $alquiler
     *
     * @return FacturaReparacion
     */
    public function setAlquiler(\AppBundle\Entity\Alquiler $alquiler = null)
    {
        $this->alquiler = $alquiler;

        return $this;
    }

    /**
     * Get alquiler
     *
     * @return \AppBundle\Entity\Alquiler
     */
    public function getAlquiler()
    {
        return $this->alquiler;
    }
}
