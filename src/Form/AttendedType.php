<?php

namespace App\Form;

use App\Entity\Attended;
use App\Entity\Program;
use App\Entity\User;
use Nette\Neon\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttendedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginDate', DateType::class, [
                'label' => 'Date de début',
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Date de fin',
            ])
            ->add('program', EntityType::class, [
                'class' => Program::class,
                'choice_label' => 'name',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'lastname',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Attended::class,
        ]);
    }
}
