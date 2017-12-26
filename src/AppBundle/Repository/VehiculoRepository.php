<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Vehiculo;
use Doctrine\ORM\EntityRepository;


class VehiculoRepository extends EntityRepository
{
    public function listadoVehiculos()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.matricula', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function detalleVehiculo($matricula)
    {
        return $this->createQueryBuilder('p')
            ->where('p.matricula = :matricula')
            ->setParameter('matricula', $matricula)
            ->getQuery()
            ->getResult();

    }

}
