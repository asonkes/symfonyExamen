<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoitureController extends AbstractController
{
    /**
     * #[Route('/voiture' ==> Ici, on met qd on clique dans vente ==> voiture se trouve dans l'URL...]
     * $voiture = $repo->findAll() ==> sert à ramener toutes les voitures avec toutes les informations
     * voiture => $voiture ==> sert à envoyer dans l'url toutes les informations et déclarer la variable voiture.
     *
     * @param VoitureRepository $repo
     * @return Response
     */
    #[Route('/vente', name: 'vente')]
    public function index(VoitureRepository $repo): Response
    {
        $voiture = $repo->findAll();
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
            'voiture' => $voiture
        ]);
    }

    #[Route("/vente/{id}", name: "vente_show")]
    public function show(int $id, Voiture $voiture): Response
    {
        $images = $voiture->getMyImages();
        return $this->render('voiture/show.html.twig', [
            'voiture' => $voiture,
            'images' => $images
        ]);
    }
}
