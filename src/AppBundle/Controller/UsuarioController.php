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

class UsuarioController extends Controller
{
    /**
     * @Route("/usuarios", name="listar_usuarios")
     */
    public function listarUsuariosAction(AuthenticationUtils $authUtils)
    {
        $usuarios = $this->getDoctrine()->getRepository('AppBundle:Usuario')->listadoUsuarios();

        return $this->render('usuarios/listado.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

}
