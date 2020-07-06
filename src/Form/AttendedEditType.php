<?php

namespace App\Form;

use App\Entity\Attended;
use App\Entity\Program;
use App\Entity\User;
use App\Form\AttendedType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttendedEditType extends AttendedType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('user')
            ->remove('program')
            ->add('beginDate', DateType::class, [
                'label' => 'Date de début',
                'format' => 'dd/MM/yyyy',
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Date de fin',
                'format' => 'dd/MM/yyyy',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Attended::class,
        ]);
    }
}
