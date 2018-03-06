<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FacturaReparacion;
use AppBundle\Form\Type\AlquilerType;
use AppBundle\Form\Type\VehiculoType;
use AppBundle\Repository\FacturaReparacionRepository;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReparacionController extends Controller
{
    /**
     * @Route("/reparaciones", name="listado_reparaciones")
     * @Security("is_granted('ROLE_MECANICO')")
     */
    public function listarReparacionesAction(Request $request)
    {
        $reparaciones = $this->getDoctrine()->getRepository('AppBundle:FacturaReparacion')->listadoReparaciones();

        return $this->render('mecanico/listado.html.twig', [
            'reparaciones' => $reparaciones,
        ]);

    }

}
