<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jobTitle')
            ->add('companyName')
            ->add('description', TextareaType::class, ['required' => false])
            ->add('contractType', ChoiceType::class, [
                'choices' => [
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'Alternance' => 'alternance',
                    'Indépendant' => 'independant'
                ],
                'multiple' => false,
                'expanded' => false
            ])
            ->add('dateStart', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('localization')
            ->add('companyLogo', FileType::class, [
                'mapped' => false,
                'constraints' => [new Image(["maxSize" => '5M', 'maxSizeMessage' => 'Fichier trop volumineux',])],
                'required' => false
            ])
            ->add('memoryPhoto',FileType::class, [
                'mapped' => false,
                'constraints' => [new Image(["maxSize" => '5M', 'maxSizeMessage' => 'Fichier trop volumineux',])],
                'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
