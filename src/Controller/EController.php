<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EController extends AbstractController
{
    #[Route('/e', name: 'e')]
    public function index(): Response
    {
        return $this->render('e/index.html.twig', [
            'controller_name' => 'EController',
        ]);
    }
}
