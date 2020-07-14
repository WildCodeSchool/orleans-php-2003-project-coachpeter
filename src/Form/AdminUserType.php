<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminUserType extends UserType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->remove('firstname')
            ->remove('lastname')
            ->remove('phone')
            ->remove('email')
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles',
                'choices' => User::ROLES,
                'multiple' => true,
                'expanded' => true,
                'mapped' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
