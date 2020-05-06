<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullname', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom & prénom']
            ])
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('company', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Société']
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Comment puis je vosu aider ?']
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ],
        ]);
    }
}