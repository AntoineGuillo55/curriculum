<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\JobRepository;
use App\Repository\StudyRepository;

class BackofficeController extends AbstractController
{
    #[Route('/admin240518', name: 'app_admin')]
    public function dashboard(): Response
    {
        return $this->render('backoffice/admin.html.twig');
    }

    #[Route('/admin/job', name: 'admin_job_list')]
    public function jobList(JobRepository $jobRepository): Response
    {
        $jobs = $jobRepository->findBy([], ['dateStart' => 'DESC']);

        return $this->render('backoffice/jobs.html.twig', [
            'jobs' => $jobs
        ]);
    }

    #[Route('/admin/studies', name: 'admin_studies_list')]
    public function studiesList(StudyRepository $studyRepository): Response
    {
        $studies = $studyRepository->findBy([], ['date' => 'DESC']);

        return $this->render('backoffice/studies.html.twig', [
            'studies' => $studies
        ]);
    }

    #[Route('/admin/portfolio', name: 'admin_portfolio_list')]
    public function portfolioList(): Response
    {
        return $this->render('backoffice/portfolio/list.html.twig');
    }

}
