<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\MessagePublic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;


class EnvoieTweetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('texteMessage', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Écrivez le contenu du tweet.',
                    ]),
                    new Length([
                        'min' => 1,
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                        'maxMessage' => 'Your message should be at most {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('image', FileType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MessagePublic::class,
        ]);
    }
}
