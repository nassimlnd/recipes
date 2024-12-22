<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Recipe;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Nom',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Nom',
                ],
            ])
            ->add('description', TextareaType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Description',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Description',
                ],
            ])
            ->add('preparationTime', IntegerType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Temps de préparation',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Temps de préparation',
                ],
            ])
            ->add('cookingTime', IntegerType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Temps de cuisson',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Temps de cuisson',
                ],
            ])
            ->add('servings', IntegerType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Nombre de parts',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Nombre de parts',
                ],
            ])
            ->add('difficulty', ChoiceType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Difficulté',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                ],
                'choices' => [
                    'Facile' => 'Facile',
                    'Moyen' => 'Moyen',
                    'Difficile' => 'Difficile',
                ],
            ])
            ->add('cuisine', ChoiceType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Cuisine',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                ],
                'choices' => [
                    'Française' => 'Française',
                    'Italienne' => 'Italienne',
                    'Chinoise' => 'Chinoise',
                    'Japonaise' => 'Japonaise',
                    'Indienne' => 'Indienne',
                    'Mexicaine' => 'Mexicaine',
                    'Marocaine' => 'Marocaine',
                    'Libanaise' => 'Libanaise',
                    'Espagnole' => 'Espagnole',
                    'Grecque' => 'Grecque',
                    'Thaïlandaise' => 'Thaïlandaise',
                    'Vietnamienne' => 'Vietnamienne',
                    'Africaine' => 'Africaine',
                    'Américaine' => 'Américaine',
                    'Brésilienne' => 'Brésilienne',
                    'Portugaise' => 'Portugaise',
                    'Russe' => 'Russe',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('image')
            ->add('isPublished')
            ->add('tags')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
