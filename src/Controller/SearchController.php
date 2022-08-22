<?php

namespace App\Controller;

use App\Repository\StatusRepository;
use App\Repository\CategoryRepository;
use App\Repository\ContractRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{

    #[Route('search', name: 'search')]
    public function index(Request $request, ContractRepository $contractRepository, CategoryRepository $categoryRepository, StatusRepository $statusRepository): Response
    {
        $contractNames = $contractRepository->contractName();
        $categoryNames = $categoryRepository->categoryName();
        $statusNames = $statusRepository->statusName();
        $names = $request->get("contract-name");
        $category = $request->get("contract-category");
        $status = $request->get("contract-status");
        $resultsByAll = $contractRepository->searchAllConditions($names, $category, $status);
        $resultsByName = $contractRepository->searchByName($names);
        $resultsByCategory = $contractRepository->searchByCategory($category);
        $resultsByStatus = $contractRepository->searchByStatus($status);
        //dd($resultsByStatus);
        return $this->render('search/index.html.twig', [
            'contractNames' => $contractNames,
            'categoryNames' => $categoryNames,
            'statusNames' => $statusNames,
            'resultsByAll' => $resultsByAll,
            'resultsByName' => $resultsByName,
            'resultsByCategory' => $resultsByCategory,
            'resultsByStatus' => $resultsByStatus
        ]);
    }
}
