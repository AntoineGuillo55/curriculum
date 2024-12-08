<?php

namespace App\Controller;

use App\Entity\Study;
use App\Form\StudyType;
use App\Repository\StudyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/studies', name: 'studies_')]
class StudyController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(StudyRepository $studyRepository): Response
    {

        $studies = $studyRepository->findAll();

        return $this->render('study/list.html.twig', [
            'studies' => $studies,
        ]);
    }

    #[Route('/add', name: 'add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $manager)
    {

        $study = new Study();
        $studyForm = $this->createForm(StudyType::class, $study);
        $studyForm->handleRequest($request);

        if ($studyForm->isSubmitted() && $studyForm->isValid()) {

            $manager->persist($study);
            $manager->flush();

            $this->addFlash('success', 'Expérience professionnelle correctement ajoutée !');
            return $this->redirectToRoute('job_list',
//                ['id' => $study->getId()]
            );
        }

        return $this->render('study/add.html.twig', [
            'studyForm' => $studyForm
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Study $study, EntityManagerInterface $manager)
    {
        $studyForm = $this->createForm(StudyType::class, $study);
        $studyForm->handleRequest($request);

        if ($studyForm->isSubmitted() && $studyForm->isValid()) {
            $manager->persist($study);
            $manager->flush();
            $this->addFlash("succes", "Le diplôme ou titre professionnel a bien été mis à jour !");
            return $this->redirectToRoute('job_list');
        }

        return $this->render('study/edit.html.twig', [
            'studyForm' => $studyForm,
            'study' => $study
        ]);
    }

    #[Route('/detail/{id}', name: 'detail', methods: ['GET', 'POST'])]
    public function detail(Study $study)
    {

        return $this->render('study/detail.html.twig', [
            'study' => $study
        ]);
    }
}
