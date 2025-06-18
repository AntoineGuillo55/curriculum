<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
<<<<<<< HEAD
  
=======

>>>>>>> acf75a12886bc30600bb7f4d1b673f2cf84d98f7
class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createFormBuilder()
            ->add('nom', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('prenom', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('entreprise', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('objet', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control', 'rows' => 5]
            ])
            ->add('envoyer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $email = (new Email())
                ->from($data['email'])
                ->to('guillo.antoine93@gmail.com') // À remplacer par l'adresse email souhaitée
                ->subject($data['objet'])
                ->html("
                    <p><strong>Nom:</strong> {$data['nom']}</p>
                    <p><strong>Prénom:</strong> {$data['prenom']}</p>
                    " . ($data['entreprise'] ? "<p><strong>Entreprise:</strong> {$data['entreprise']}</p>" : "") . "
                    <p><strong>Message:</strong></p>
                    <p>{$data['message']}</p>
                ");

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');
            return $this->redirectToRoute('main_home');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
} 