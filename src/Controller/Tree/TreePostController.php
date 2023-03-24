<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class TreePostController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

        public function __invoke(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $tree = new Tree\Tree();

        $tree->setTitle($data['title']);
        $tree->setDescription($data['description']);

        $entityManager->persist($tree);
        $entityManager->flush();

        return $this->json([
            'message' => 'User created successfully',
            'tree' => $tree,
        ]);
    }
}
