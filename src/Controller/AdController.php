<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    #[Route('/vente', name: 'ad')]
    public function index(AdRepository $repo): Response
    {
        $ad = $repo->findAll();
        return $this->render('ad/index.html.twig', [
            'controller_name' => 'AdController',
            'ad' => $ad,
        ]);
    }

    #[Route("/vente/{id}", name: "ad_show")]
    public function show(int $id, Ad $ad): Response
    {
        return $this->render('ad/show.html.twig', [
            'ad' => $ad
        ]);
    }
}
