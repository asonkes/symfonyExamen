<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\AnnonceType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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

    #[Route("/vente/{id}/new", name: "vente_new")]
    public function new(Request $request, EntityManagerInterface $manager, Voiture $voiture): Response
    {
        // Sert à créer une nouvelle voiture
        $voiture = new Voiture();
        // 
        $form = $this->createForm(AnnonceType::class, $voiture);
        $form->handleRequest($request);

        /**
         * C'est ici qu'on gère l'ajout ou la suppression de l'image de la voiture...
         */
        if ($form->isSubmitted() && $form->isValid()) {
            //On récupère les datas de l'image
            $file = $form["image"]->getData();
            if (!empty($file)) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin;Latin-ASCII; [^A-Za-z0-9] remove; Lower()', $originalFilename);
                $newFileName = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter("uploads_directory"),
                        $newFileName
                    );
                } catch (FileException $error) {
                    return $error->getMessage();
                }

                $voiture->setImage("images/" . $newFileName);
            } else {
                $voiture->setImage(null);
            }

            $manager->persist($voiture);
            $manager->flush();

            return $this->redirectToRoute("vente");
        }
        return $this->render('voiture/new.html.twig', [
            // On crée la vue du formulaire
            "form" => $form->createView()
        ]);
    }
}
