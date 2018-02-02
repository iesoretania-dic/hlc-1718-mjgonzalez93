<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 2/02/18
 * Time: 12:45
 */

namespace AppBundle\Form\Type;

use AppBundle\Entity\Alquiler;
use AppBundle\Entity\Vehiculo;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlquilerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vehiculo', EntityType::class, [
                'class' => Vehiculo::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.matricula', 'ASC');
                },
                'label' => 'Coche solicitado'])
            ->add('dias', null,[
                'label' => 'Dias',
            ]);

            if(false === $options['nuevo']) {
                $builder
                    ->add('precioTotal', null, [
                        'label' => 'Precio total'
                    ])
                    ->add('alquilado', null, [
                        'label' => 'Alquilado'
                    ])
                    ->add('rechazado', null, [
                        'label' => 'Rechazado'
                    ])
                    ->add('devuelto', null, [
                        'label' => 'Devuelto'
                    ])
                    ->add('paraReparar', null, [
                        'label' => 'Para reparar'
                    ]);
            }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alquiler::class,
            'nuevo' => false

        ]);
    }
}