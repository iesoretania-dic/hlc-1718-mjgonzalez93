<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Vehiculo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DatosIniciales extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Jugadores
        $vehiculos = [
            ["2568PLK", "Honda", "Civic", "Coche", "120", "Sin Plomo 98", "Calle Sin Nombre 25", "50", false],
            ["2548SDR", "Ferrari", "F40", "Coche", "300", "Sin Plomo 95", "Calle Sin Nombre 25", "150", false],
            ["4872RFP", "Mercedes", "Clase A", "Coche", "200", "Sin Plomo 95", "Calle Sin Nombre 25", "100", false],
            ["0003MGP", "Aprilia", "RS-GP", "Moto", "1000", "Sin Plomo 98", "Calle Falsa 123", "300", false],
            ["9857SRS", "Ford", "E 450", "Bus", "200", "Sin Plomo 98", "Calle Falsa 123", "60", false],
            ["5874DRW", "Olbap", "TR6", "Barco", "400", "Diesel", "Muelle de San Blas nº18", "500", false]
        ];

        foreach ($vehiculos as $coche) {
            $vehiculo = new Vehiculo();
            $vehiculo->setMatricula($coche[0])
                ->setMarca($coche[1])
                ->setModelo($coche[2])
                ->setCategoria($coche[3])
                ->setCilindrada($coche[4])
                ->setCombustible($coche[5])
                ->setDireccionAlmacenado($coche[6])
                ->setPrecioDia($coche[7])
                ->setEnReparacion($coche[8]);

            $manager->persist($vehiculo);
        }

        $manager->flush();
    }
}