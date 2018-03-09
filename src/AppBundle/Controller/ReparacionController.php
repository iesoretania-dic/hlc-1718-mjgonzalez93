<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alquiler;
use AppBundle\Entity\FacturaReparacion;
use AppBundle\Form\Type\AlquilerType;
use AppBundle\Form\Type\ReparacionType;
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

    /**
     * @Route("/reparacion/nueva", name="nueva_reparacion")
     * @Route("/editar/reparacion/{id}", name="editar_reparacion")
     * @Security("is_granted('ROLE_MECANICO')")
     */
    public function formularioReparacionAction(Request $request, FacturaReparacion $factura = null)
    {
        $em = $this->getDoctrine()->getManager();

        $nuevo = false;

        if (null === $factura) {
            $factura = new FacturaReparacion();
            $nuevo = true;
            $em->persist($factura);
        }

        $form = $this->createForm(ReparacionType::class, $factura, ['nuevo' => $nuevo]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $mecanico = $this->getUser();
                $precioReparacion = $form->get('precio')->getData();
                $usuario = $factura->getAlquiler()->getUsuario();
                $saldo = $usuario->getSaldo();
                $usuario->setSaldo($saldo - $precioReparacion);
                $factura->setMecanico($mecanico);
                $factura->getAlquiler()->setParaReparar(false);
                $em->flush();
                $this->addFlash('exito', 'Cambios guardados correctamente ' );
                return $this->redirectToRoute('listado_reparaciones');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios ' );
            }
        }

        return $this->render('mecanico/form.html.twig', [
            'factura' => $factura,
            'formulario' => $form->createView()
        ]);

    }

    /**
     * @Route("/eliminar/reparacion/{id}", name="eliminar_reparacion")
     * @Security("is_granted('ROLE_MECANICO')")
     */
    public function eliminarReparacionAction(Request $request, FacturaReparacion $factura)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            try {
                $em->remove($factura);
                $em->flush();
                return $this->redirectToRoute('listado_reparaciones');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se ha podido eliminar la factura ');
            }
        }

        return $this->render('mecanico/eliminar.html.twig', [
            'factura' => $factura
        ]);
    }
}
