<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
class TreePutController extends AbstractController
{   private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Request $request, Tree\Tree $tree, EntityManagerInterface $entityManager): JsonResponse
    {   $data = json_decode($request->getContent(), true);

        $tree->setTitle($request->request->get('title'));
        $tree->setDescription($request->request->get('description'));

        $this->entityManager->persist($tree);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'User updated successfully',
            'tree' => $tree,
            ]);
    }
}