<?php

namespace App\Controller\Tree;
use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
class TreeDeleteController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function __invoke(Tree\Tree $tree, EntityManagerInterface $entityManager): JsonResponse
    {
        $entityManager->remove($tree);
        $entityManager->flush();

        return new JsonResponse(['message' => 'User deleted']);
    }
}