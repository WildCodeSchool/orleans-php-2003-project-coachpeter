<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    const ROLES = [
        "Client" => "ROLE_USER",
        "Membre" => "ROLE_MEMBER",
        "Administrateur" => "ROLE_ADMIN",];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices' => self::ROLES,
                'multiple' => true,
                'expanded' => true,
                'mapped' => true,
            ])
            ->add('firstname')
            ->add('lastname')
            ->add('phone');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
