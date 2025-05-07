<?php

namespace App\Controller;

use App\Repository\StudyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home')]
    public function home(StudyRepository $studyRepository): Response
    {
        $studies = $studyRepository->findBy([], ['date' => 'DESC']);

        return $this->render('main/home.html.twig', [
            'studies' => $studies
        ]);
    }
}
