<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\BrandRepository;
use App\Repository\CategoryRepository;
use App\Repository\CompanyRepository;
use App\Repository\ContractRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ContractRepository $contractRepository): Response
    {
        $lastContracts = $contractRepository->showLastFiveContracts();
        $contractsInProgress = $contractRepository->showInProgressContracts();
        $contractsSoonFinish = $contractRepository->allContractsAmendements();
        return $this->render('home/index.html.twig', [
            'lastContracts' => $lastContracts,
            'inProgressContracts' => $contractsInProgress,
            'contractsSoonFinish' => $contractsSoonFinish
        ]);
    }

    #[Route('/contracts', name: 'contracts')]
    public function allContracts(ContractRepository $contractRepository): Response
    {
        $allContracts = $contractRepository->findAll();
        return $this->render('home/contracts.html.twig', [
            'allContracts' => $allContracts
        ]);
    }
}
