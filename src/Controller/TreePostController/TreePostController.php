<?php

namespace App\Controller\TreePostController;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;

class TreePostController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
    }

        public function __invoke(Request $request): Response
    {
        $tree = new Tree\Tree();

        $tree->setName($request->request->get('name'));
        $tree->setDescription($request->request->get('description'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($tree);
        $entityManager->flush();

        return $this->json($tree);
    }
}
