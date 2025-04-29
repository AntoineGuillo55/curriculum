<?php

namespace App\Form;

use App\Entity\Study;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class StudyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('degreeName')
            ->add('level', ChoiceType::class, [
                'choices' => [
                    'Niveau 4' => 4,
                    'Niveau 5' => 5,
                    'Niveau 6' => 6,
                    'Niveau 7' => 7
                ],
                'multiple' => false,
                'expanded' => false
            ])
            ->add('bac', ChoiceType::class, [
                'choices' => [
                    'Bac +2' => 2,
                    'Bac +3' => 3,
                    'Bac +4' => 4,
                    'Bac +5' => 5
                ],
                'multiple' => false,
                'expanded' => false
            ])
            ->add('schoolName')
            ->add('degreeState', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'en cours',
                    'Obtenu' => 'obtenu',
                ],
                'multiple' => false,
                'expanded' => false
            ])
            ->add('localization')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('schoolPhoto', FileType::class, [
                'mapped' => false,
                'constraints' => [new Image(["maxSize" => '5M', 'maxSizeMessage' => 'Fichier trop volumineux',])],
                'required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Study::class,
        ]);
    }
}
