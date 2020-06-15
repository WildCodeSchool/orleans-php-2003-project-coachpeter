<?php

namespace App\Form;

use App\Entity\InfoCoach;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoCoachType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('phone')
            ->add('mail')
            ->add('adress')
            ->add('zipCode')
            ->add('city')
            ->add('catchline')
            ->add('image')
            ->add('philosophy')
            ->add('presentation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoCoach::class,
        ]);
    }
}
