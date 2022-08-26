<?php

namespace App\Controller;

use App\Repository\StatusRepository;
use App\Repository\CategoryRepository;
use App\Repository\ContractRepository;
use App\Repository\AmendementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ContractRepository $contractRepository, CategoryRepository $categoryRepository, StatusRepository $statusRepository, AmendementRepository $amendementRepository): Response
    {
        $contractNames = $contractRepository->contractName();
        $categoryNames = $categoryRepository->categoryName();
        $statusNames = $statusRepository->statusName();
        $lastContracts = $contractRepository->showLastFiveContracts();
        $contractsInProgress = $contractRepository->showInProgressContracts();
        // $contractsSoonFinish = $contractRepository->showContractFinishSoon();
        $amendements = $amendementRepository->findAll();
        $contractNotifications = $contractRepository->contractNotifications();
        // dd($notifications);

        return $this->render('home/index.html.twig', [
            'contractNames' => $contractNames,
            'categoryNames' => $categoryNames,
            'statusNames' => $statusNames,
            'lastContracts' => $lastContracts,
            'inProgressContracts' => $contractsInProgress,
            // 'contractsSoonFinish' => $contractsSoonFinish,
            'amendements' => $amendements,
            'contractNotifications' => $contractNotifications
        ]);
    }

    #[Route('/contracts', name: 'contracts')]
    public function allContracts(ContractRepository $contractRepository, AmendementRepository $amendementRepository): Response
    {
        $amendements = $amendementRepository->findAll();
        $allContracts = $contractRepository->allContracts();
        return $this->render('home/contracts.html.twig', [
            'allContracts' => $allContracts,
            'amendements' => $amendements,
        ]);
    }
}
