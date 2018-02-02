<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alquiler;
use AppBundle\Form\Type\AlquilerType;
use AppBundle\Form\Type\VehiculoType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlquilerController extends Controller
{
    /**
     * @Route("/alquiler/nuevo", name="nuevo_alquiler")
     */
    public function nuevoAlquilerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nuevo = true;

        $alquiler = new Alquiler();
        $em->persist($alquiler);

        $form = $this->createForm(AlquilerType::class, $alquiler,['nuevo' => $nuevo]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $dias = $form->get('dias')->getData();
                $vehiculo = $form->get('vehiculo')->getData();
                $precioDia = $vehiculo->getPrecioDia();
                $precioTotal = $dias * $precioDia;
                $usuario = $this->getUser();
                $alquiler->setUsuario($usuario);
                $alquiler->setPrecioTotal($precioTotal);
                $em->flush();
                $this->addFlash('exito', 'Solicitud realizada correctamente ' );
                return $this->redirectToRoute('listado_vehiculos');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios ' );
            }
        }

        return $this->render('alquiler/form.html.twig', [
            'alquiler' => $alquiler,
            'formulario' => $form->createView()
        ]);

    }

    /**
     * @Route("/alquiler/editar/{id}", name="edicion_vehiculos")
     */
    public function alquilerEditarAction(Request $request, Alquiler $id)
    {
        $em = $this->getDoctrine()->getManager();
        $nuevo = false;

        $form = $this->createForm(VehiculoType::class, $id,['nuevo' => $nuevo]);

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

        return $this->render('alquiler/form.html.twig', [
            'alquiler' => $id,
            'formulario' => $form->createView()
        ]);

    }

}
