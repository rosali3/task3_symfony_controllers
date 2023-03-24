<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class TreePutController extends AbstractController
{   private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Request $request, Tree\Tree $tree, EntityManagerInterface $entityManager): JsonResponse
    {   $data = json_decode($request->getContent(), true);

        $tree->setTitle($data['title']);
        $tree->setDescription($data['description']);

        $this->entityManager->persist($tree);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'User updated successfully',
            'tree' => $tree,
            ]);
    }
}
