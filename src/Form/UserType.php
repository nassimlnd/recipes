<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Adresse e-mail',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Email',
                ],
            ])
            ->add('roles', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN'
                ],
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Roles',
                ],
            ])
            ->add('password', PasswordType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Confirmation du mot de passe',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => '••••••••',
                ],
            ])
            ->add('isVerified', CheckboxType::class, [
                'mapped' => false,
                'row_attr' => [
                    'class' => 'flex gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium w-full',
                ],
                'label' => 'Compte vérifié',
                'attr' => [
                    'class' => 'placeholder:placeholder border border-primary custom-shadow-xs',
                ],
            ])
            ->add('fullName', TextType::class, [
                'row_attr' => [
                    'class' => 'flex flex-col gap-1.5',
                ],
                'label_attr' => [
                    'class' => 'text-secondary text-sm font-medium',
                ],
                'label' => 'Nom complet',
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'John Doe',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
