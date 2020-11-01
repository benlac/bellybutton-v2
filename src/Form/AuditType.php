<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AuditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ],
                'label' => 'Votre email',
            ])
            ->add('budget', ChoiceType::class, [
                'label' => 'Votre budget',
                'choices' => [
                    '1000€ - 10 000€' => '1000€ - 10 000€',
                    '10 000€ - 50 000€' => '10 000€ - 50 000€',
                    '+50 000€' => '+50 000€',
                    'À définir' => 'À définir',
                    'Autre' => 'Autre',
                ]
            ])
            ->add('goal', ChoiceType::class, [
                'label' => 'Vos objectifs',
                'choices' => [
                    'ROI' => 'ROI',
                    'Visibilité/Impact' => 'Visibilité/Impact',
                    'Presence sur les nouveaux médias sociaux' => 'Presence sur les nouveaux médias sociaux',
                    'Acquisition de nouveaux clients' => 'Acquisition de nouveaux clients',
                    'Objectif multiples' => 'Objectif multiples',
                    'À définir' => 'À définir',
                ]
            ])
            ->add('deadline', ChoiceType::class, [
                'label' => 'Date envisagée de la campagne',
                'choices' => [
                    'ASAP!' => 'ASAP!',
                    'Dans les mois à venir' => 'Dans les mois à venir',
                    'Dans les 3 prochains mois' => 'Dans les 3 prochains mois',
                    'Au cours de l\'année' => 'Au cours de l\'année',
                    'Indeterminé pour le moment' => 'Indeterminé pour le moment',
                ]
            ])
            ->add('dateRdv', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Choississez la date'
            ])
            ->add('hourRdv', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Choississez l\'heure'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => [
                'novalidate' => 'novalidate'
            ],
        ]);
    }
}