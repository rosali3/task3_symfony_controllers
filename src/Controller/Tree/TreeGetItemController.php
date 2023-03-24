<?php

namespace App\Controller\Tree;
use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TreeGetItemController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Tree\Tree $tree, int $id): JsonResponse
    {
        $tree = $this->entityManager->getRepository(Tree\Tree::class)->find($id);

        if (!$tree) {
            throw $this->createNotFoundException('User not found');
        }
        return $this->json($tree);
    }
}