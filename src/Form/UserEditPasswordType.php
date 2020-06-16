<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserEditPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', RepeatedType::class, [
                'empty_data' => '',
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe doit être identique.',
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Répéter le mot de passe'),
                'constraints' => [
                  new NotBlank(),
                  new Regex([
                      'pattern' => "/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/",
                      'message' => "Votre mot de passe doit contenir au moins 1 chiffre, 1 majuscule, 1 minuscule et avoir une longueur d'au moins 8 caractères."
                  ])
              ]
            ])
        ; 
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}