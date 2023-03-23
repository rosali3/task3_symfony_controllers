<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;

class TreePatchController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, private readonly ManagerRegistry $doctrine){
        // $this->doctrine;
        //$this->entityManager = $entityManager;
        }
    public function __invoke(Request $request, Tree\Tree $tree, $entityManager): Response
    {
        if ($request->request->has('name')) {
            $tree->setTitle($request->request->get('title'));
        }

        if ($request->request->has('description')) {
            $tree->setDescription($request->request->get('description'));
        }

        $entityManager->persist($tree);
        $entityManager->flush();

        return $this->json($tree);
    }
}
