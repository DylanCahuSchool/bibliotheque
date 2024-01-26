<?php
// src/Controller/IndexController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        // Votre logique pour la page d'index va ici
        // Par exemple, afficher une vue ou retourner une réponse simple

        return $this->render('index.html.twig');
    }
}
