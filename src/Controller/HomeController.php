<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * #[Route('/'==> ici simplement '/', car c'est la home, donc il n'y a rien en plus comme texte à afficher dans l'url]
     * 
     * Response = elle est utilisée pour renvoyer le contenu généré par le template Twig en réponse à la requête sur l'URL "/".
     *
     * @return Response
     */
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $controllerName = 'homeController';

        return $this->render('home/index.html.twig', [
            'controller_name' => $controllerName
        ]);
    }
}
