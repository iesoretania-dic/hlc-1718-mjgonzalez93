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

        $coches = $this->getDoctrine()->getRepository('AppBundle:Vehiculo')->listadoVehiculos();

        return $this->render('vehiculos/listado.html.twig', [
            'coches' => $coches
        ]);
    }

    /**
     * @Route("/coche/{matricula}", name="detalle_coche")
     */
    public function detalleVehiculoAction($matricula)
    {

        $coches = $this->getDoctrine()->getRepository('AppBundle:Vehiculo')->detalleVehiculo($matricula);


        return $this->render('vehiculos/detalle.html.twig', [
            'coches' => $coches
        ]);
    }


}
