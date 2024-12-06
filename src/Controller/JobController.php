<?php

namespace App\Controller;

use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/jobs', name: 'job_')]
class JobController extends AbstractController
{
    #[Route('', name: 'list')]
    public function index(JobRepository $jobRepository): Response
    {
        $jobs = $jobRepository->findAll();

        return $this->render('job/list.html.twig', [
            'jobs' =>  $jobs
        ]);
    }
}
