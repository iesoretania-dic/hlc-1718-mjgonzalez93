<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Form\Type\UsuarioType;
use AppBundle\Form\Type\VehiculoType;
use AppBundle\Repository\AlquilerRepository;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuarios", name="listar_usuarios")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function listarUsuariosAction(AuthenticationUtils $authUtils)
    {
        $usuarios = $this->getDoctrine()->getRepository('AppBundle:Usuario')->listadoUsuarios();

        return $this->render('usuarios/listado.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @Route("/usuario/clave/{id}", name="cambiar_password_admin")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function cambiarPasswordAction(Request $request, Usuario $id) {

        $usuario = $this->getDoctrine()->getRepository('AppBundle:Usuario')->usuarioPassword($id);
        $usuario = $usuario[0];

        $form = $this->createForm(UsuarioType::class, $usuario, [
            'admin' => $this->isGranted('ROLE_ADMIN'),
            'cambiar_password' => true
        ]);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            try {
                $claveFormulario = $form->get('nueva')->get('first')->getData();

                if ($claveFormulario) {
                    $clave = $this->get('security.password_encoder')
                        ->encodePassword($usuario, $claveFormulario);

                    $usuario->setPassword($clave);
                }

                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('exito', 'Cambios guardados correctamente ' );
                return $this->redirectToRoute('incio');
            }catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios ' );
            }
        }
        return $this->render('usuarios/password.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
