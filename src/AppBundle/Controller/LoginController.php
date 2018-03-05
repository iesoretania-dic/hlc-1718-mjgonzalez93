<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Form\Type\UsuarioType;
use AppBundle\Form\Type\VehiculoType;
use AppBundle\Repository\AlquilerRepository;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/entrar", name="usuario_entrar")
     */
    public function entrarAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $ultimoUsuario = $authUtils->getLastUsername();

        return $this->render('seguridad/entrar.html.twig', [
            'ultimo_usuario' => $ultimoUsuario,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/salir", name="usuario_salir")
     */
    public function salirAction()
    {

    }

    /**
     * @Route("/perfil", name="perfil")
     */
    public function cambiarPerfilAction(Request $request) {

        $usuario = $this->getUser();

        $form = $this->createForm(UsuarioType::class, $usuario, [
            'admin' => $this->isGranted('ROLE_ADMIN'),
            'modificar_perfil' => true
        ]);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            try {
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('exito', 'Cambios guardados correctamente ' );
                return $this->redirectToRoute('incio');
            }catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios ' );
            }
        }
        return $this->render('seguridad/perfil.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/perfil/clave", name="cambiar_password")
     */
    public function cambiarPasswordAction(Request $request) {

        $usuario = $this->getUser();

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
        return $this->render('seguridad/perfil.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
