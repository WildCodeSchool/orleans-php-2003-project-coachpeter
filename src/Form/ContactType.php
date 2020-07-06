<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Contact;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => ['class' => "col-12 mb-3", 'placeholder' => "Sandrine"],
                'label' => 'Prénom',
                'required'   => true,
                ])
            ->add('lastname', TextType::class, [
                'attr' => ['class' => "col-12 mb-3", 'placeholder' => "Germain" ],
                'label' => 'Nom',
                'required'   => true,
                ])
            ->add('phone', TextType::class, [
                'attr' => ['class' => "col-12 mb-3", 'placeholder' => "0687654321"],
                'label' => 'Numéro de téléphone',
                'required'   => true,
                ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => "col-12 mb-3", 'placeholder' => "sandrine.germain@gmail.com"],
                'label' => 'Adresse Email',
                'required'   => true,
                ])
            ->add('message', TextareaType::class, [
                'attr' => ['class' => "col-12 mb-3", 'placeholder' => "Je suis intéressée par votre programme. Auriez-vous plus d'informations à me communiquer ?"],
                'label' => 'Message',
                'required'   => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
