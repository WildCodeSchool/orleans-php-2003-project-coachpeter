<?php

namespace App\Form;

use App\Entity\InfoCoach;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('catchline', TextareaType::class, [
                'attr' => ['class'=>"col-12 form-h-1"
                ]])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'help'=> 'le fichier ne doit pas dépasser '. InfoCoach::MAX_SIZE,
            ])

            ->add('planningFile', VichImageType::class, [
                'label' => 'Ajoutez votre planning',
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
            ])

            ->add('philosophy', TextareaType::class, [
                'attr' => ['class'=>"col-12 form-h-1"
                ]])
            ->add('presentation', TextareaType::class, [
                'attr' => ['class'=>"col-12 form-h-3"
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoCoach::class,
        ]);
    }
}
