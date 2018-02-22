<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 2/02/18
 * Time: 12:45
 */

namespace AppBundle\Form\Type;

use AppBundle\Entity\Usuario;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni', null, [
                'label' => 'DNI',
                'disabled' => ($options['admin'] === false)
            ])
            ->add('nombre', null,[
                'label' => 'Nombre',
            ])
            ->add('apellidos', null,[
                'label' => 'Apellidos',
            ])
            ->add('direccion', null,[
                'label' => 'Direccion',
            ])
            ->add('email', null,[
                'label' => 'Email',
            ]);
            if(true === $options['cambiar_password']) {
                $builder
                    ->add('antigua', PasswordType::class, [
                        'label' => 'Antigua contraseña',
                        'mapped' => false,
                        'constraints' => [
                            new UserPassword()
                        ]
                    ])
                    ->add('nueva', RepeatedType::class, [
                        'mapped' => false,
                        'type' => PasswordType::class,
                        'first_options' => [
                            'label' => 'Nueva contraseña',
                        ],
                        'second_options' => [
                            'label' => 'Repita nueva contraseña'
                        ]
                    ]);
            }
            if(true === $options['admin']) {
                $builder
                    ->add('comercial', null, [
                        'label' => 'Comercial'
                    ])
                    ->add('mecanico', null, [
                        'label' => 'Mecanico'
                    ]);
            }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
            'admin' => false,
            'cambiar_password' => false
        ]);
    }
}