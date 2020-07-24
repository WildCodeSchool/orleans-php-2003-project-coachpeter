<?php

namespace App\Form;

use App\Entity\Actuality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use \DateTime;

class ActualityEditType extends ActualityType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => "col"
                ]])
            ->add('date', DateType::class, [
                'label' => 'Date: jour/mois/année',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker col mb-3'],
            ])
            ->add('topic', TextType::class, [
                'label' => 'Thème',
                'attr' => ['class' => "col"
                ]])
            ->add('actualityFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'help'=> 'le fichier ne doit pas dépasser '. Actuality::MAX_SIZE,
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'download_link' => false,
                'delete_label'  => 'Supprimer cette image',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => ['class' => "col form-h-2"
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
        ]);
    }
}
