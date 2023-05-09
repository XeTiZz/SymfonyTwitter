<?php

namespace App\Controller;

use App\Entity\Like;
use App\Entity\MessagePublic;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\LikeType;
use App\Repository\LikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class LikeController extends AbstractController
{
    #[Route('/like/poste/{id}', name: 'like.post', methods: ['GET'])]
    public function like(MessagePublic $messagePublic, LikeRepository $likeR, EntityManagerInterface $manager): Response
    {
        $user = $this->getUser();

        $existingLike = $likeR->findOneBy([
            'user' => $user,
            'messageP' => $messagePublic
        ]);

        if ($existingLike) {
            return $this->redirect($this->generateUrl('app_index'));
        }

        $like = new Like();
        $like->setMessageP($messagePublic);
        $like->setUser($user);
        $manager->persist($like);
        $manager->flush();

        return $this->redirect($this->generateUrl('app_index'));
    }

    #[Route('/unlike/poste/{id}', name: 'unlike.post', methods: ['GET'])]
    public function unlike(MessagePublic $messagePublic, LikeRepository $likeR, EntityManagerInterface $manager): Response
    {
        $user = $this->getUser();
        $like = $likeR->findOneBy([
            'user' => $user,
            'messageP' => $messagePublic
        ]);

        if ($like) {
            $manager->remove($like);
            $manager->flush();

            return $this->redirect($this->generateUrl('app_index'));
        }

        return $this->redirect($this->generateUrl('app_index'));
    }
}
