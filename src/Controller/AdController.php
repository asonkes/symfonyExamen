<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * Permet de pouvoir faire une route(chemin) vers la page "ad" = noté dans l'Url(/vente), permet de pouvoir avoir accès à la galerie.
     *
     * @param AdRepository $repo
     * @return Response
     */
    #[Route('/vente', name: 'ad')]
    public function index(AdRepository $repo): Response
    {
        $ad = $repo->findAll();
        return $this->render('ad/index.html.twig', [
            'controller_name' => 'AdController',
            'ad' => $ad,
        ]);
    }

    /**
     * Permet de pouvoir faire une route(chemin) vers la page "ads" = noté dans l'Url(/vente/{id}), permet de pouvoir avoir accès au détail de chaque voiture.
     *
     * @param integer $id
     * @param Ad $ad
     * @return Response
     */
    #[Route("/vente/{id}", name: "ad_show")]
    public function show(int $id, Ad $ad): Response
    {
        $images = $ad->getImages();
        return $this->render('ad/show.html.twig', [
            'ad' => $ad,
            'images' => $images
        ]);
    }
}
