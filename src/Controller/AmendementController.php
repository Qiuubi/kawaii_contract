<?php

namespace App\Controller;

use App\Entity\Amendement;
use App\Form\AmendementType;
use App\Repository\AmendementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/amendement')]
class AmendementController extends AbstractController
{
    /*
    #[Route('admin/amendement/lists', name: 'amendement_list', methods: ['GET'])]
    public function index(AmendementRepository $amendementRepository): Response
    {
        return $this->render('admin/amendement/index.html.twig', [
            'amendements' => $amendementRepository->findAll(),
        ]);
    }
    */

    #[Route('admin/amendement/add{id}', name: 'amendement_add', methods: ['GET', 'POST'])]
    public function new(Request $request, AmendementRepository $amendementRepository): Response
    {
        $amendement = new Amendement();
        $form = $this->createForm(AmendementType::class, $amendement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amendementRepository->add($amendement);
            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/amendement/add.html.twig', [
            'amendement' => $amendement,
            'form' => $form,
        ]);
    }

    #[Route('admin/amendement/{id}', name: 'amendement_show', methods: ['GET'])]
    public function show(Amendement $amendement): Response
    {
        return $this->render('admin/amendement/show.html.twig', [
            'amendement' => $amendement,
        ]);
    }

    #[Route('admin/amendement/edit/{id}', name: 'amendement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Amendement $amendement, AmendementRepository $amendementRepository): Response
    {
        $form = $this->createForm(AmendementType::class, $amendement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amendementRepository->add($amendement);
            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/amendement/edit.html.twig', [
            'amendement' => $amendement,
            'form' => $form,
        ]);
    }

    #[Route('admin/delete/{id}', name: 'amendement_del', methods: ['POST'])]
    public function delete(Request $request, Amendement $amendement, AmendementRepository $amendementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $amendement->getId(), $request->request->get('_token'))) {
            $amendementRepository->remove($amendement);
        }

        return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
    }
}
