<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VehiculoController extends Controller
{
    /**
     * @Route("/vehiculos", name="listado_vehiculos")
     */
    public function listadoVehiculosAction()
    {

        $vehiculos = $this->getDoctrine()->getRepository('AppBundle:Vehiculo')->listadoVehiculos();

        return $this->render('vehiculos/listado.html.twig', [
            'vehiculos' => $vehiculos
        ]);
    }

    /**
     * @Route("/vehiculo/{matricula}", name="detalle_vehiculo")
     */
    public function detalleVehiculoAction($matricula)
    {

        $vehiculos = $this->getDoctrine()->getRepository('AppBundle:Vehiculo')->detalleVehiculo($matricula);

        return $this->render('vehiculos/detalle.html.twig', [
            'vehiculos' => $vehiculos
        ]);
    }

    /**
     * @Route("/vehiculos/{categoria}", name="listado_categoria")
     */
    public function listadoCategoriaAction($categoria)
    {

        $vehiculos = $this->getDoctrine()->getRepository('AppBundle:Vehiculo')->categoriaVehiculo($categoria);

        return $this->render('vehiculos/listado.html.twig', [
            'vehiculos' => $vehiculos
        ]);
    }

}
