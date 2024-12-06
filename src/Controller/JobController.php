<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/add', name: 'add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $manager){

        $jobForm = $this->createForm(JobType::class);
        $jobForm->handleRequest($request);

        if($jobForm->isSubmitted() && $jobForm->isValid()) {
            $job = new Job();
            $job->setJobTitle($jobForm->get('jobTitle')->getData());
            $job->setCompanyName($jobForm->get('companyName')->getData());
            $job->setContractType($jobForm->get('contractType')->getData());
            $job->setCompanyLogo($jobForm->get('companyLogo')->getData());
            $job->setLocalization($jobForm->get('localization')->getData());
            $job->setDescription($jobForm->get('description')->getData());
            $job->setDateStart($jobForm->get('dateStart')->getData());
            $job->setDateEnd($jobForm->get('dateEnd')->getData());
            $job->setMemoryPhoto($jobForm->get('memoryPhoto')->getData());

            $manager->persist($job);
            $manager->flush();

            $this->addFlash('success', 'Expérience professionnelle correctement ajoutée !');
            return $this->redirectToRoute('job_detail', ['id' => $job->getId()]);
        }

        return $this->render('job/add.html.twig', ['jobForm' => $jobForm]);

    }
}
