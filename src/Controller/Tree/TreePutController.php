<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
class TreePutController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){}
        protected ManagerRegistry $doctrine;

    public function __invoke(Request $request, Tree\Tree $tree): Response
    {
        $tree->setTitle($request->request->get('title'));
        $tree->setDescription($request->request->get('description'));

        $entityManager = $this->doctrine;
        $entityManager->persist($tree);
        $entityManager->flush();

        return $this->json($tree);
    }}
