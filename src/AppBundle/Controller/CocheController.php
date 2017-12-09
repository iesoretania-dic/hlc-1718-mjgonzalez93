<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CocheController extends Controller
{
    /**
     * @Route("/coches", name="listado_coches")
     */
    public function listadoCochesAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $coches = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Vehiculo', 'p')
            ->orderBy('p.matricula', 'ASC')
            ->getQuery()
            ->getResult();


        return $this->render('coches/listado.html.twig', [
            'coches' => $coches
        ]);
    }

}
