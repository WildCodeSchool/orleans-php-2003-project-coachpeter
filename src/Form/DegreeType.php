<?php

namespace App\Form;

use App\Entity\Degree;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class DegreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => "col mb-3"]
            ])
            ->add('organism', TextType::class, [
                'label' => 'Organisme',
                'attr' => ['class' => "col mb-3"]
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                 'attr' => ['class' => "col mb-3"]
            ])
            ->add('startDate', NumberType::class, [
                'label' => 'Date de début',
                'attr' => ['class' => "col mb-3"]
            ])
            ->add('endDate', NumberType::class, [
                'label' => 'Date de fin',
                'attr' => ['class' => "col mb-3"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Degree::class,
        ]);
    }
}
