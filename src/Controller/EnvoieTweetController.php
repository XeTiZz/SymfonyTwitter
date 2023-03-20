<?php

namespace App\Controller;
use App\Entity\MessagePublic;
use App\Entity\User;
use App\Form\EnvoieTweetType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EnvoieTweetController extends AbstractController
{
    #[Route('/envoie_tweet', name: 'app_envoie_tweet')]
    public function show(Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new MessagePublic();
        $userid = $this->getUser();
        $form = $this->createForm(EnvoieTweetType::class, $message);
        $form->handleRequest($request);
        // var_dump($form->isSubmitted()); 
        // exit;

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setDateCreaMessage(new \DateTime(date("Y-m-d H:i:s")));
            $message->setLikeMessage(0);
            $message->setRtMessage(0);
            $message->setUtil($userid);

            if($form->get('image')->getData()){
                $image = $form->get('image')->getData();
            
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
            
                $image->move(
                    $this->getParameter('image_directory_path'),
                    $fichier
                );
            
                $message->setImage($fichier);
            }

            $entityManager->persist($message);
            $entityManager->persist($userid);
            $entityManager->flush();
            return $this->redirect($this->generateUrl('app_index'));

        }

        return $this->render('envoie_tweet/index.html.twig', [
            'envoieTweet' => $form->createView(),
        ]);
    }
}
