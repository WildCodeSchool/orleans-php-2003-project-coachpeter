<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => "col-12"
                ]])

            ->add('description', TextType::class, [
                'attr' => ['class' => "col-12 form-h-2 align-items-end"
                ]])

            ->add('pictogram', ChoiceType::class, [
                'choices' => [
                    '' => '',
                    'Haltère' => 'white_haltere.svg',
                ]])

            ->add('activityFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
            ])

            ->add('category', null, ['choice_label' => 'category'])

            ->add('focus');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
