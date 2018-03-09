<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Alquiler;
use AppBundle\Entity\FacturaReparacion;
use AppBundle\Entity\Vehiculo;
use AppBundle\Repository\FacturaReparacionRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReparacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if(true === $options['nuevo']) {
            $builder
                ->add('alquiler', EntityType::class, [
                    'class' => Alquiler::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('a')
                            ->andWhere('a.paraReparar = true');
                    }]);
        }

        $builder
            ->add('descripcion', null,[
                'label' => 'Descripción de la reparación',
            ])
            ->add('precio', null,[
                'label' => 'Precio de la reparación',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FacturaReparacion::class,
            'nuevo' => false
        ]);
    }
}