<?php

namespace App\Controller;

use App\Repository\AmendementRepository;
use App\Repository\ContractRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('admin', name: 'admin')]
    public function index(ContractRepository $contractRepository, AmendementRepository $amendementRepository): Response
    {
        $amendements = $amendementRepository->findAll();
        $contracts = $contractRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'contracts' => $contracts,
            'amendements' => $amendements,
        ]);
    }
}
