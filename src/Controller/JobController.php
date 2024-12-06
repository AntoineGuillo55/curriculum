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

        $job = new Job();
        $jobForm = $this->createForm(JobType::class, $job);
        $jobForm->handleRequest($request);

        if($jobForm->isSubmitted() && $jobForm->isValid()) {

            $manager->persist($job);
            $manager->flush();

            $this->addFlash('success', 'Expérience professionnelle correctement ajoutée !');
            return $this->redirectToRoute('job_list',
//                ['id' => $job->getId()]
            );
        }

        return $this->render('job/add.html.twig', ['jobForm' => $jobForm]);
    }

    #[Route('/detail/{id}', name: 'detail', methods: ['GET', 'POST'])]
    public function detail(Request $request, Job $job){

        return $this->render('job/detail.html.twig', [
            'job' => $job
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Job $job, EntityManagerInterface $manager){

        $jobForm = $this->createForm(JobType::class, $job);
        $jobForm->handleRequest($request);

        if($jobForm->isSubmitted() && $jobForm->isValid()) {

            $manager->persist($job);
            $manager->flush();
            $this->addFlash("success", "L'expérience professsionnelle a bien été mise à jour ! ");
            return $this->redirectToRoute('job_detail', ['id' => $job->getId()]);
        }
        return $this->render('job/edit.html.twig', ['jobForm' => $jobForm, 'job' => $job]);
    }

    #[Route('/delete/{id}', name: 'delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, Job $job, EntityManagerInterface $manager){

        if ($job) {
            $manager->remove($job);
            $manager->flush();

            $this->addFlash("success", "L'expérience professionnelle a été supprimée avec succès !");
            return $this->redirectToRoute('job_list');
        }

        return $this->createNotFoundException();

    }


}
