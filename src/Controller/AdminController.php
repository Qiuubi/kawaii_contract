<?php

namespace App\Controller;

use App\Repository\ContractRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    #[Route('/admin', name: 'admin')]
    public function index(ContractRepository $contractRepository): Response
    {
        $contracts = $contractRepository->allContractsAmendements();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'contractsSoonFinish' => $contracts
        ]);
    }
}
