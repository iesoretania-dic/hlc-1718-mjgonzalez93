<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Vehiculo;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if(true === $options['nuevo']){
            $builder
            ->add('matricula', null, [
                'label' => 'Matricula'
            ]);
        }
        $builder
            ->add('marca', null, [
                'label' => 'Marca'
            ])
            ->add('modelo', null, [
                'label' => 'Modelo',

            ])
            ->add('categoria', null, [
                'label' => 'Categoria',
            ])
            ->add('cilindrada', null, [
                'label' => 'Cilindrada',
            ])
            ->add('combustible', null, [
                'label' => 'Combustible',
            ])
            ->add('direccionAlmacenado', null,[
                'label' => 'Direccion almacenado',
            ])
            ->add('precioDia', null,[
                'label' => 'Precio por dia',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehiculo::class,
            'nuevo' => false
        ]);
    }
}