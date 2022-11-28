<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomUtil')
            ->add('prenomUtil', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a firstname',
                    ]),
                ],
                'required' => true,
            ])
            ->add('pseudoUtil', TextType::class, [
                'attr' => ['class' => 'FieldWidth'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a pseudo',
                    ]),
                ],
                'required' => true,
            ])
            ->add('email', EmailType::class,[
                'attr' => ['class' => 'FieldWidth'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a email',
                    ]),
                ],
                'required' => true,
            ])
            ->add('ageUtil', CheckboxType::class,[
                'attr' => ['class' => 'FieldWidth'],
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'attr' => ['class' => 'FieldWidth'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'options' => ['attr'=> ['class' => 'FieldWidth']],
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => '/[a-z]/',
                        'match' => true,
                        'message' => 'You are required to have at least 1 tiny',
                    ]),
                    new Regex([
                        'pattern' => '/[A-Z]/',
                        'match' => true,
                        'message' => 'You are required to have at least 1 capital',
                    ]),
                    new Regex([
                        'pattern' => '/[0-9]/',
                        'match' => true,
                        'message' => 'You are required to have 1 number at least',
                    ]),
                    new Regex([
                        'pattern' => '/[#?!]/',
                        'match' => true,
                        'message' => 'You are required to have 1 at least one special character',
                    ]),
                ],
                'required' => true,
                'type' => PasswordType::class,
                'first_options' => array('label' => 'label.password'),
                'second_options' => array('label' => 'label.confirm_password'),
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
