<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Vehiculo;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bridge\Doctrine\Tests\Fixtures\ContainerAwareFixture;


class DatosIniciales extends ContainerAwareFixture implements ORMFixtureInterface
{

    /**
     * @var ContainerInterface
     */
    public $container;

    public function load(ObjectManager $manager)
    {
        $vehiculos = [
            ["2568PLK", "Honda", "Civic", "Coche", "120", "Sin Plomo 98", "Calle Sin Nombre 25", "50", false],
            ["0288KKK", "Pontiac", "Firebird 400 HO", "Coche", "230", "Sin Plomo 98", "Calle Cualquiera 12", "70", false],
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

        $usuarios = [
            ["11111111A", "oretania", "Manu", "Gonzalez", "Calle falsa 21", "quemasda@gmail.com", "219", true, false, false, false],
            ["22222222B", "oretania", "Comercial 1", "Vende", "Calle Cualquiera 2", "comercial@alquilatuvehiculo.com", "219", false, true, false, false],
            ["33333333C", "oretania", "Mecanico 1", "Arregla", "Calle Allen 2", "mecanico@alquilatuvehiculo.com", "147", false, false, true, false],
            ["44444444D", "oretania", "Cliente 1", "Compra", "Calle Alcampo 41", "cliente@alquilatuvehiculo.com", "219", false, false, false, true]
        ];

        foreach ($usuarios as $item) {
            $usuario = new Usuario();
            $usuario
                ->setdni($item[0])
                ->setPassword($this->container->get('security.password_encoder')->encodePassword($usuario, $item[1]))
                ->setNombre($item[2])
                ->setApellidos($item[3])
                ->setDireccion($item[4])
                ->setEmail($item[5])
                ->setSaldo($item[6])
                ->setAdministrador($item[7])
                ->setComercial($item[8])
                ->setMecanico($item[9])
                ->setCliente($item[10]);

            $manager->persist($usuario);

        }

        $manager->flush();
    }


}