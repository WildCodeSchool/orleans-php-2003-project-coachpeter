<?php

namespace App\Form;

use App\Entity\InfoCoach;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
            ])
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
