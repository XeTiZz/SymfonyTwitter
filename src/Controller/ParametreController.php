<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\ChangerMDPType;
use Doctrine\ORM\EntityManagerInterface;
use App\Security\LoginAuthenticator;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class ParametreController extends AbstractController
{
    #[Route('/parametre', name: 'app_parametre')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(ChangerMDPType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $entityManager->persist($user);
            $entityManager->flush();

        }

        return $this->render('parametre/parametre.html.twig', [
            'ChangerMDP' => $form->createView(),
        ]);
    }
}
