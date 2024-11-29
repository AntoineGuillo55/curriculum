<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StudyController extends AbstractController
{
    #[Route('/study', name: 'app_study')]
    public function index(): Response
    {
        return $this->render('study/index.html.twig', [
            'controller_name' => 'StudyController',
        ]);
    }
}
