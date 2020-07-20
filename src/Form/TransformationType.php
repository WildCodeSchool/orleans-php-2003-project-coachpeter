<?php

namespace App\Form;

use App\Entity\Transformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class TransformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('pound')
            ->add('description', TextareaType::class)
            ->add('title')
            ->add('pictureBeforeFile', VichFileType::class, [

                'required'      => false,
                'help'=> 'le fichier ne doit pas dépasser '. Transformation::MAX_SIZE,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri'  => true, // not mandatory, default is true
                'download_link' => false,
                'delete_label'  => 'Supprimer cette image',
            ])
            ->add('pictureAfterFile', VichFileType::class, [
                'required'      => false,
                'help'=> 'le fichier ne doit pas dépasser '. Transformation::MAX_SIZE,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'download_link' => true,
                'download_label' => 'Voir l\'image',
                'delete_label'  => 'Supprimer cette image',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transformation::class,
        ]);
    }
}
