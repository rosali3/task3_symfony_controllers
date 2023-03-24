<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class TreePatchController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Request $request, Tree\Tree $tree, $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['title'])) {
            $tree->setTitle($data['title']);}

        if (isset($data['description'])) {
            $tree->setDescription($data['description']);}

        $this->$entityManager->persist($tree);
        $this->$entityManager->flush();

        return $this->json([
            'message' => 'User updated successfully',
            'tree' => $tree,
                ]);
    }
}

