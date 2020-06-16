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

class ActualityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['style' => "width:300px"]])
            ->add('date', DateType::class, [
                'label' => 'Date: jour-mois-année',
                'format' => 'dd MM yyyy',
            ])
            ->add('theme', TextType::class, [
                'label' => 'Thème',
                'attr' => ['style' => "width:300px"]])
            ->add('actualityFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => ['style' => "width:500px; height:500px"
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
        ]);
    }
}
