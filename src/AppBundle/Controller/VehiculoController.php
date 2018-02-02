<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehiculo;
use AppBundle\Form\Type\VehiculoType;
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
     * @Route("/vehiculos/{matricula}", name="detalle_vehiculo")
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

    /**
     * @Route("/vehiculo/nuevo", name="nuevo_vehiculo")
     * @Route("/vehiculo/editar/{id}", name="edicion_vehiculos")
     */
    public function formularioVehiculosAction(Request $request, Vehiculo $matricula = null)
    {
        $em = $this->getDoctrine()->getManager();
        $nuevo = false;

        if (null === $matricula) {
            $matricula = new Vehiculo();
            $nuevo = true;
            $em->persist($matricula);
        }

        $form = $this->createForm(VehiculoType::class, $matricula,['nuevo' => $nuevo]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('exito', 'Cambios guardados correctamente ' );
                return $this->redirectToRoute('listado_vehiculos');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios ' );
            }
        }

        return $this->render('vehiculos/form.html.twig', [
            'matricula' => $matricula,
            'formulario' => $form->createView()
        ]);

    }

}