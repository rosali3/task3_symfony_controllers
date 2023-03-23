<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class TreeGetCollectionController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function __invoke(Request $request): \Symfony\Component\HttpFoundation\JsonResponse
    {
        // dd(json_decode($request->getContent()));
        $trees = $this->entityManager->getRepository(Tree\Tree::class)->findAll();
        return $this->json($trees);
    }
}
