<?php

namespace App\Form;

use App\Entity\Contacto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('correo', EmailType::class,[
                'help' => 'Tiene que contener @'
                //Uso el EmailType para que solo acepte correos electronicos
            ] )
            ->add('telefono')
            ->add('tipo', ChoiceType::class, [
                'choices' =>[
                    'personal' => 'personal',
                    'profesional' => 'profesional'
                    //Uso el Choice para crear un selector solo para los tipos de agendas
                ],
            ])
            ->add('notas')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
