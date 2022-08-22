<?php

namespace App\Controller;

use App\Entity\Contract;
use App\Form\ContractType;
use App\Repository\ContractRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// #[Route('/')]
class ContractController extends AbstractController
{
    /*
    #[Route('/admin/contract/lists', name: 'contract_list', methods: ['GET'])]
    public function index(ContractRepository $contractRepository): Response
    {
        return $this->render('admin/contract/index.html.twig', [
            'contracts' => $contractRepository->findAll(),
        ]);
    }
    */

    #[Route('admin/contract/add', name: 'contract_add', methods: ['GET', 'POST'])]
    public function new(Request $request, ContractRepository $contractRepository): Response
    {
        $contract = new Contract();
        $form = $this->createForm(ContractType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contract->setCreatedAt(new \DateTimeImmutable('now'));
            $contractRepository->add($contract);
            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/contract/add.html.twig', [
            'contract' => $contract,
            'form' => $form,
        ]);
    }

    #[Route('admin/contract/{id}', name: 'contract_show', methods: ['GET'])]
    public function show(Contract $contract): Response
    {
        return $this->render('admin/contract/show.html.twig', [
            'contract' => $contract,
        ]);
    }

    #[Route('admin/contract/edit/{id}', name: 'contract_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contract $contract, ContractRepository $contractRepository): Response
    {
        $form = $this->createForm(ContractType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contractRepository->add($contract);
            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/contract/edit.html.twig', [
            'contract' => $contract,
            'form' => $form,
        ]);
    }

    #[Route('admin/contract/del/{id}', name: 'contract_delete', methods: ['POST'])]
    public function delete(Request $request, Contract $contract, ContractRepository $contractRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contract->getId(), $request->request->get('_token'))) {
            $contractRepository->remove($contract);
        }

        return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
    }
}
