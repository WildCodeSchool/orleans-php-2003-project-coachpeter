<?php

namespace App\Form;

use App\Entity\Ressource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RessourceType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, ['choices' => Ressource::TYPES_FILES])
            ->add('refVideo')
            ->add('name')
            ->add('fileFile', VichFileType::class, [
                'label' => 'Fichier à télécharger',
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
            ])
            ->add('theme', null, ['choice_label'=>'nameTheme'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
}
