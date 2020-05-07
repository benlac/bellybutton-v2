<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AuditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('budget', ChoiceType::class, [
                'label' => 'Votre budget',
                'choices' => [
                    '1000€ - 10 000€' => '1000€ - 10 000€',
                    '10 000€ - 50 000€' => '10 000€ - 50 000€',
                    '+50 000€' => '+50 000€',
                    'autres' => 'autres'
                ]
            ])
            ->add('goal', ChoiceType::class, [
                'label' => 'Vos objectifs',
                'choices' => [
                    'ROI' => 'ROI',
                    'Visibilité/Impact' => 'Visibilité/Impact',
                    'À définir' => 'À définir',
                    'Presence sur les nouveaux médias sociaux' => 'Presence sur les nouveaux médias sociaux',
                    'acquisition de nouveaux clients' => 'acquisition de nouveaux clients',
                    'Objectif multiples' => 'Objectif multiples',
                ]
            ])
            ->add('deadline', ChoiceType::class, [
                'label' => 'Date envisagée de la campagne',
                'choices' => [
                    'ASAP!' => 'ASAP!',
                    'dans les mois à venir' => 'dans les mois à venir',
                    'dans les 3 prochains mois' => 'dans les 3 prochains mois',
                    'au cours de l\'année' => 'au cours de l\'année',
                    'indeterminé pour le moment' => 'indeterminé pour le moment',
                ]
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