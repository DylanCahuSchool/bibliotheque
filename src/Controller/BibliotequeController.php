<?php

namespace App\Controller;

use App\Entity\Biblioteque;
use App\Form\BibliotequeType;
use App\Repository\BibliotequeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/biblioteque')]
class BibliotequeController extends AbstractController
{
    #[Route('/', name: 'app_biblioteque_index', methods: ['GET'])]
    public function index(BibliotequeRepository $bibliotequeRepository): Response
    {
        return $this->render('biblioteque/index.html.twig', [
            'biblioteques' => $bibliotequeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_biblioteque_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $biblioteque = new Biblioteque();
        $form = $this->createForm(BibliotequeType::class, $biblioteque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($biblioteque);
            $entityManager->flush();

            return $this->redirectToRoute('app_biblioteque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('biblioteque/new.html.twig', [
            'biblioteque' => $biblioteque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_biblioteque_show', methods: ['GET'])]
    public function show(Biblioteque $biblioteque): Response
    {
        return $this->render('biblioteque/show.html.twig', [
            'biblioteque' => $biblioteque,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_biblioteque_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Biblioteque $biblioteque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BibliotequeType::class, $biblioteque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_biblioteque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('biblioteque/edit.html.twig', [
            'biblioteque' => $biblioteque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_biblioteque_delete', methods: ['POST'])]
    public function delete(Request $request, Biblioteque $biblioteque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$biblioteque->getId(), $request->request->get('_token'))) {
            $entityManager->remove($biblioteque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_biblioteque_index', [], Response::HTTP_SEE_OTHER);
    }
}
