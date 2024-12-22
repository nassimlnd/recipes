<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, array(
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Votre nom complet'
                ],
                'label' => false
            ))
            ->add('email', EmailType::class, array(
                'attr' => [
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => 'Votre adresse email'
                ],
                'label' => false
            ))
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => false,
                'row_attr' => [
                    'class' => 'flex items-center flex-row-reverse'
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisation.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'placeholder:placeholder px-3.5 py-2.5 border border-primary rounded-lg custom-shadow-xs w-full',
                    'placeholder' => '••••••••'
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        'max' => 4096,
                    ]),
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
