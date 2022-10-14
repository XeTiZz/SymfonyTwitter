<?php

namespace App\Controller;

use App\Repository\MessagePublicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MessagePublic;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;


class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(Request $request, Environment $twig, MessagePublicRepository $messagePublicRepository): Response
        {$offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $messagePublicRepository->getMessagePaginator($offset);

            return new Response($twig->render('index/index.html.twig', [
            'messages' => $paginator,
            'previous' => $offset - MessagePublicRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + MessagePublicRepository::PAGINATOR_PER_PAGE),
            'middle'=>$offset,
            'nbrPaginator'=>MessagePublicRepository::PAGINATOR_PER_PAGE,
        ]));
    }

    // #[Route('/message/{id}', name: 'message')]
    // public function show(Environment $twig, MessagePublic $messagePublic): Response
    // {
    //     return new Response($twig->render('/post.html.twig', [
    //         'message' => $messagePublic,
    //     ]));
    // }

    #[Route('/poste/{id}', name: 'thisPoste')]
    public function show(Environment $twig, MessagePublic $messagePublic): Response
    {
        return new Response($twig->render('poste/thisPoste.html.twig', [
            'message' => $messagePublic,
        ]));
    }
}

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function connexion(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}