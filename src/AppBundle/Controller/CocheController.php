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

    /**
     * @Route("/coche/{matricula}", name="detalle_coche")
     */
    public function detalleCocheAction($matricula)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $coches = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Vehiculo', 'p')
            ->where('p.matricula = :matricula')
            ->setParameter('matricula', $matricula)
            ->getQuery()
            ->getResult();


        return $this->render('coches/detalle.html.twig', [
            'coches' => $coches
        ]);
    }


}
